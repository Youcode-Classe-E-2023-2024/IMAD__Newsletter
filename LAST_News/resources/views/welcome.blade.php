<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen overflow-hidden" style="background: #edf2f7;">
    <nav class="bg-gray-200 shadow shadow-gray-300 w-100 px-8 md:px-auto">
	<div class="md:h-16 h-28 mx-auto md:px-4 container flex items-center justify-between flex-wrap md:flex-nowrap">

		<div class="text-indigo-500 w-full flex items-center justify-between md:order-1">
	
        <img width="48" height="48" src="https://img.icons8.com/fluency/48/mailing.png" alt="mailing"/>
        <form method="POST" action="{{ route('storelog') }}">
    @csrf
        <div class=" flex gap-4 ">
   
		<div class="text-gray-500 order-3  w-full md:w-auto md:order-2">
        <input placeholder="Enter your emal..." class="input" name="email" type="text">
        <input placeholder="Enter your password..." class="input" name="password" type="text">
		</div>
		<div class="order-2 md:order-3">
			<button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-gray-50 rounded-xl flex items-center gap-2">
      
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                 <path fill-rule="evenodd" d="M17 3a1 1 0 010 2H6.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0 1 1 0 011.414 1.414L6.414 7H17a1 1 0 110 2H6.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0 1 1 0 011.414 1.414L6.414 11H17a1 1 0 010 2H6.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0 1 1 0 011.414 1.414L6.414 15H17a1 1 0 010 2H4a1 1 0 110-2h11.586l-1.293-1.293a1 1 0 111.414-1.414l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414 0 1 1 0 01-1.414-1.414L13.586 13H3a1 1 0 110-2h11.586l-1.293-1.293a1 1 0 111.414-1.414l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414 0 1 1 0 01-1.414-1.414L13.586 9H17a1 1 0 010-2z" clip-rule="evenodd" />
            </svg>

                <span>Login</span>
            </button>
		</div>
  </div>
</form>
    </div>
</nav>
<div class="flex-1 ">
<!-- HTML -->
<div class="flex items-center justify-center h-screen  flex-col  ">
  <div class="flex items-center justify-center  h-2/5  flex-col">
    <div class="input-group bg-blue-300 mb-12 gap-5 p-8">
        <input id="emailInput" type="email" placeholder="Enter your email..." class="input" name="text" type="text">
        <button onclick="subscribe()" class="button--submit">Subscribe</button>
    </div>
    <label class="checkbox " for="checkbox1">
  <span class="label">Agree to receive daily news</span>
  <input  id="checkbox1" type="checkbox">
  <span class="checkmark"></span>
</label>
</div>
<style>
  .checkbox {
  display: flex;
  align-items: center;
  
  font-family: Arial, sans-serif;
  color: black;
}

.checkbox input {
  display: none;
}

.checkbox .checkmark {
  width: 28px;
  height: 28px;
  border-radius: 10px;
  background-color: #ffffff2b;
  box-shadow: rgba(0, 0, 0, 0.62) 0px 0px 5px inset, rgba(0, 0, 0, 0.21) 0px 0px 0px 24px inset,
        #22cc3f 0px 0px 0px 0px inset, rgba(224, 224, 224, 0.45) 0px 1px 0px 0px;
  cursor: pointer;
  position: relative;
}

.checkbox .checkmark::after {
  content: "";
  width: 18px;
  height: 18px;
  border-radius: 5px;
  background-color: #e3e3e3;
  box-shadow: transparent 0px 0px 0px 2px, rgba(0, 0, 0, 0.3) 0px 6px 6px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  transition: background-color 0.3s ease-in-out;
}

.checkbox input:checked + .checkmark {
  background-color: #22cc3f;
  box-shadow: rgba(0, 0, 0, 0.62) 0px 0px 5px inset, #22cc3f 0px 0px 0px 2px inset, #22cc3f 0px 0px 0px 24px inset,
        rgba(224, 224, 224, 0.45) 0px 1px 0px 0px;
}

.checkbox input:checked + .checkmark::after {
  background-color: white;
}

.checkbox .label {
  margin-right: 10px;
  user-select: none;
  font-weight: 700;
  cursor: pointer;
}
</style>
</div>
<!-- Add this script after your HTML content -->
<script>
    function subscribe() {
      console.log("hi")
        const emailInput = document.getElementById('emailInput');
        const email = emailInput.value;

        fetch('/subscribe', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({ email }),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data.message);
            // Optionally, you can handle success UI updates here
        })
        .catch(error => {
            console.error(error.message);
            // Optionally, you can handle error UI updates here
        });
    }
</script>


</div>
<style>
    .input-group {
  display: flex;
  align-items: center;
}



.button--submit {
  min-height: 30px;
  padding: .5em 1em;
  border: none;
  border-radius: 0 6px 6px 0;
  background-color: #5e4dcd;
  color: #fff;
  font-size: 15px;
  cursor: pointer;
  transition: background-color .3s ease-in-out;
}

.button--submit:hover {
  background-color: #5e5dcd;
}

.input:focus, .input:focus-visible {
  border-color: #3898EC;
  outline: none;
}

    .input {
  background-color: #212121;
  max-width: 190px;
  height: 40px;
  padding: 10px;
  /* text-align: center; */
  border: 2px solid white;
  border-radius: 5px;
  /* box-shadow: 3px 3px 2px rgb(249, 255, 85); */
}

.input:focus {
  color: rgb(0, 255, 255);
  background-color: #212121;
  outline-color: rgb(0, 255, 255);
  box-shadow: -3px -3px 15px rgb(0, 255, 255);
  transition: .1s;
  transition-property: box-shadow;
}
</style>
</body>
</html>

