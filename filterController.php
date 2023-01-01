<?php

use App\Repositories\GitRepository;
use App\Services\DataAdapterService;

require __DIR__.'/vendor/autoload.php';

$data_service = new DataAdapterService(new GitRepository);
$url= $data_service->search($_POST['created'], $_POST['language'], $_POST['per_page'], $_POST['sort']);
$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_HTTPHEADER => [
		"User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 YaBrowser/16.3.0.7146 Yowser/2.5 Safari/537.36"
	],
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'GET',
	));

$response = curl_exec($curl);

curl_close($curl);
   $response = json_decode($response, true);
?>
<table   class="table thead-dark table-striped table-bordered mt-5">
	<tr  class="table-primary">
		<th>id</th>
		<th>name</th>
		<th>full_name</th>
		<th>language</th>
	</tr>
	<?php 
		foreach($response['items'] as $row)
		{
			$id = $row['id'];
			$name = $row['name'];
			$full_name = $row['full_name'];
			$language = $row['language'];
			?>
			<tr>
				<td><?php echo $id ?></td>
				<td><?php echo $name ?></td>
				<td><?php echo $full_name ?></td>
				<td><?php echo $language ?></td>
			</tr>
			<?php
		}
	?>
	
</table>