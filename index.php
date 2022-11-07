<!DOCTYPE html>
<html lang='en'>

<head>
	<meta charset='UTF-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>Hola</title>
	<script src='https://cdn.tailwindcss.com'></script>
	<link rel="stylesheet" href="./main.css">

</head>

<body style="background-color: #15202B;" class='body'>

	<form method='POST' action='auth/login.php' class="border border-gray-500 rounded-md">
		<div class='mb-6'>
			<label for='username' class='block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300'>Your username</label>
			<input id='username'
				class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'
				name='username'
				placeholder='name@flowbite.com' required>
		</div>

		<div class='mb-6'>
			<label for='password' class='block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300'>Your
				password</label>
			<input type='password' id='password'
				class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'
				name="password"
				required>
		</div>

		<div class='flex items-start mb-6'>
			<div class='flex items-center h-5'>
				<input id='remember' type='checkbox' value=''
					class='w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800'>
			</div>
			<label for='remember' class='ml-2 text-sm font-medium text-gray-900 dark:text-gray-300'>Remember me</label>
		</div>

		<button type='submit'
			class='text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>Submit</button>
	</form>

</body>

</html>