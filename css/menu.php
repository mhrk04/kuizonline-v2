<style>
  ul {
    text-transform: uppercase;
    list-style: none;
    width: 145px;
    margin-left: 10px;
    padding: 0px;
    position: absolute;
    display: block;
    box-shadow: 10px 10px 5px rgba(96, 96, 96, 0.8);

  }

  ul li {
    border-bottom: 1px solid white;
    background: rgb(61, 130, 233);
    position: relative;
    display: block;
  }

  ul li a {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 12px;
    font-weight: bold;
    text-align: left;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    display: block;
  }

  ul li:hover {
    background-color: tomato;
    -ms-transform: scale(1.5);
    -webkit-transform: scale(1.5);
    transform: scale(1.2);
  }

  a.logout {
    background-color: red;
    margin-top: 10px;
  }

  body {
    background-image: linear-gradient(to right, rgb(0, 204, 255, 1), rgba(102, 0, 255, 1))
  }

  div.all {
    width: 700px;
    height: 650px;
    margin: 30px auto;
    border-radius: 15px;
    border: 2px solid lightblue;
    background-color: rgb(87, 121, 172);
    box-shadow: 15px 15px 6px rgba(96, 96, 96, 0.7);
  }

  h3.menu {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    color: white;
    width: 100px;
    padding: 10px;
    border: 3px solid white;
    border-radius: 15px;
    margin: 10px auto;
    background-color: orange;
    box-shadow: 7px 7px 5px rgba(96, 96, 96, 0.8);
  }

  h2.nama {
    text-transform: uppercase;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 12px;
    font-weight: bold;
    text-align: center;
    color: yellow;
  }


  div.header {
    width: 700px;
    height: 50px;
    border-radius: 10px 10px 0 0;
    background-color: turquoise;
    float: left;
  }

  div.menu {
    clear: left;
    float: left;
    position: relative;
    border: none;
    border-radius: 0 0 0 15px;
    width: 170px;
    height: 600px;
    background-color: teal;
    z-index: 5;
  }

  div.kandungan {
    overflow: auto;
    float: left;
    position: relative;
    border: none;
    border-radius: 0 0 10px 0;
    width: 530px;
    height: 600px;
    z-index: 1;
    /* background-color: rgb(61, 233, 127); */
    padding: auto;
  }

  /* css padam */
  .padam:link,
  .padam:visited {
    background-color: #f44336;
    color: black;
    padding: 9px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 1.5rem;
  }

  .padam:hover,
  .padam:active {
    background-color: red;
  }

  /* css update */
  .update:link,
  .update:visited {
    background-color: rgb(159, 237, 107);
    color: black;
    padding: 9px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 1.5rem;
  }

  .update:hover,
  .update:active {
    background-color: green;
  }

  .aktif {
    background-color: tomato;
  }
</style>