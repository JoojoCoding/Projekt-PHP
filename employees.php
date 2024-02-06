<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        
        section{
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
        }
        .panel{
            width: 20%;
            
        }
        .workerList{
            width: 80%;
            overflow-y: scroll;
            background-color: #333;
            border-radius: 5px; 

        }
        .worker{
            border: 1px solid black;
            display: flex;
            flex-direction: row;
            margin: 20px;
            border-radius: 7px; 
            background-color: #202020;
        }
        .bxs-user-circle {
            font-size: 100px;
            padding: 20px;
        }
        .head{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <section>
        <div class="panel">
            <?php include_once("incl/menuPanel.php"); ?>
        </div>
        <div class="workerList">
            <h2 style="text-align:center;">Pracownicy serwisu</h2>
        </div>

    </section>
    <script>
        const d = document

        const fetchData = async() => {
            let res = await fetch("http://localhost/phpapp/Projekt-PHP/employeesBase.php", {
                method: "get",
                header: "Content-Type: application/json"
            })
            if(!res.ok) throw new Error("data error")
            let data = await res.json()
            console.log(data)
            Build(data)
        }
        const Build = data => {
            const workerList = d.querySelector(".workerList")
            data.forEach(el => {
                let worker = CreateWorker(el)
                workerList.appendChild(worker)
            })
        }
        const CreateIcon = () => {
            let div = d.createElement("div")
            let icon = d.createElement("i")
            icon.className = "bx bxs-user-circle"
            div.appendChild(icon)
            return div
        }
        const CreateWorker = worker =>{
            let div = d.createElement("div")
            div.className = "workerData"
            let workerName = d.createElement("p")
            workerName.innerText = `${worker.imie} ${worker.nazw}, ${worker.odd}`
            workerName.className = "head"

            let phone = d.createElement("p")
            let phoneIcon = d.createElement("i")
            phoneIcon.className = "bx bxs-phone"
            let phoneText = d.createElement("span")
            phoneText.innerText = `${worker.tel}`
            phone.appendChild(phoneIcon)
            phone.appendChild(phoneText)

            let email = d.createElement("p")
            let emailIcon = d.createElement("i")
            emailIcon.className = "bx bx-envelope"
            let emailText = d.createElement("span")
            emailText.innerText = `${worker.email}`
            email.appendChild(emailIcon)
            email.appendChild(emailText)

            let mainDiv = d.createElement("div")
            mainDiv.className = "worker"
            let icon = CreateIcon()
            mainDiv.appendChild(icon)
            div.appendChild(workerName)
            div.appendChild(phone)
            div.appendChild(email)
            mainDiv.appendChild(div)
            return mainDiv
        }
        window.addEventListener("load", fetchData)
    </script>
</body>
</html>