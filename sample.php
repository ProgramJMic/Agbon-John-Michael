<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modal Form</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<button id="openModal">Open Modal</button>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Enter Details</h2>

    <form method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" class = "form-control" name="asset_name" value=" <?php echo $asset; ?> required>
      
      <label for="location">Location:</label>
      <input type="text" id="location" name="location" value="<?php echo $location; ?>" required>
      
      <label for="condition">Condition:</label>
      <input type="text" id="condition" name="concern" value="<?php echo $concern; ?>" required>
      
      <label for="quantity">Quantity:</label>
      <input type="number" id="quantity" name="quantity" value="<?php echo $quantity; ?>" required>
      
      <button type="submit">Submit</button>
    </form>
  </div>
</div>

<script>
  var modal = document.getElementById("myModal");
  var btn = document.getElementById("openModal");
  var span = document.getElementsByClassName("close")[0];

  btn.onclick = function() {
    modal.style.display = "block";
  }

  span.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

</body>
</html>

<style>
/* Modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  max-width: 400px;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

form {
  display: grid;
  gap: 10px;
}

label {
  font-weight: bold;
}

input[type="text"],
input[type="number"],
button[type="submit"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
}

</style>
