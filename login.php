<!-- <!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class = "bg-red-900">
  <h1 class="text-3xl font-bold underline bg-blue-900">
    Hello world!
  </h1>
  <main class="flex flex-col mx-auto my-10 p-10 border-solid border-2 border-teal-500 rounded">
    <div class="self-center">
    Login
  </div>
    <div class ="flex flex-row ">
      Username:<input class = "basis-1/2 px-8 border-solid border-2 border-teal-500" type="text" name="" id="">
      Password:<input class = "basis-1/4 px-8" type="password" name="" id="">
      <button class = "basis-1/4">Submit</button>
    </div>
  </main>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Example</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php include 'component/form.php'; ?>
</head>
<body class="bg-teal-100">
  <div class="container mx-auto w-1/3 text-center">
    <img src="./images/brain_logo2.png" alt="logo">
    <div class="flex items-center justify-center text-lg">
      <p>Not signed up yet? </p>
      <a  class="uppercase text-grey-700 px-5 hover:text-blue-500 hover:scale-125" href="#">
        Sign up
      </a> 
    <p>Here</p>
    </div>
  </div>
    <div class="container mx-auto py-8 xl:px-40 lg:px-36 md:px-32 sm:px-28">
        <form action="#" method="post" class=" text-2xl bg-white p-6 rounded-lg shadow-md bg-gradient-to-br from-blue-200 to-white">
            <h1 class="text-5xl font-bold text-center pb-3">Login</h1>
            <?php
                echo formInput('text', 'Username', 'Enter your username', '', true);
                echo formInput('password', 'Password', 'Enter your password', '', true);
            ?>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500  text-white font-bold py-2 px-4 rounded hover:bg-blue-700 ease-in-out duration-300 focus:bg-blue-900" type="submit">
                    Login
                </button>
                <a class="font-bold text-blue-500  px-4 hover:text-blue-800 hover:scale-125 ease-in-out duration-300" href="#">
                    Forgot Password?
                </a>
            </div>
        </form>
    </div>
</body>
</html>
