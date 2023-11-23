console.log(window.codsenselecionado)

// Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.6.0/firebase-app.js";
  import { getDatabase, ref, get } from "https://www.gstatic.com/firebasejs/10.6.0/firebase-database.js";
 
  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyCREnK3O2yPeCuASD_VsWJVUo69HGR7OAI",
    authDomain: "dataimmersus.firebaseapp.com",
    databaseURL: "https://dataimmersus-default-rtdb.firebaseio.com",
    projectId: "dataimmersus",
    storageBucket: "dataimmersus.appspot.com",
    messagingSenderId: "788583786474",
    appId: "1:788583786474:web:6ad60f774604e65631b493"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const database = getDatabase();

  // Specify the reference to the location in your database (replace 'CodSen/ValorTemp' with your actual path)
  //const dataRef = ref(database, 'CodSen/ValorTemp');

 
  console.debug(database);
  // Since Firebase operations are asynchronous, you may want to use async/await
  //async function fetchData
  async   function fetchData() {
    try {
      // Perform database operations here, e.g., fetching data
      //console.debug(database);
      // Make sure CodSen is a string
      var CodSen = window.codsenselecionado;
      var getTemp = await get(ref(database,CodSen + '/ValorTemp'));
      var getUmi = await get(ref(database, CodSen + '/ValorUmi'));
      var getLumi = await  get(ref(database, CodSen + '/ValorLumi'));
      
      console.debug('getTemp:', getTemp.val());
      console.debug('getUmi:', getUmi.val());
      console.debug('getLumi:', getLumi.val());

      if (getUmi.exists() && getLumi.exists() && getTemp.exists()) {
    
        var currentDate = new Date();
       
        // Extract individual components of the date
        var year = currentDate.getFullYear();
        var month = currentDate.getMonth() + 1; // Months are zero-indexed, so add 1
        var day = currentDate.getDate();
        var hours = currentDate.getHours();
        var minutes = currentDate.getMinutes();
        var seconds = currentDate.getSeconds();
        var formattedDate = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
        // ${hours}:${minutes}:${seconds}
        var Umi = getUmi.val();
        var Lumi = getLumi.val();
        var Temp = getTemp.val();
        
        console.debug(Umi, Lumi, Temp, formattedDate);
        
        var xhr = new XMLHttpRequest();
        var url = 'fire.php'; // Replace with the actual path to your PHP script
        var params = 
            'Umi=' + encodeURIComponent(Umi) +
            '&Lumi=' + encodeURIComponent(Lumi) +
            '&Temp=' + encodeURIComponent(Temp) +
            '&Date=' + encodeURIComponent(formattedDate);  // Include formattedDate in the params
        
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                document.getElementById('resultContainer').innerHTML = response;
            }
        };
      xhr.send(params);
   } else {
        console.log('No data found.');
      }

      // You can also use 'await' with other Firebase functions here
    } catch (error) {
      console.error("Error:", error);
    }
  }    

fetchData();

//(fetchData, 60000);