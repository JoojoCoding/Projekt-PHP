<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .device{
            color: black;
            text-align: center;
            border: 1px solid gray;
            padding: 10px;
            width: 80%;
            margin: 10px auto;
            
        }
        section{
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
        .content{
            width: 80%;
            margin: 10px;
        }
        .panel{
            width: 20%;
        }
        .filter{
            border: 1px solid black;
            width: 300px;
        }
        .content{
            display: flex;
            flex-direction: row;
        }
        .device {
            width: 500px;
        }
    </style>
</head>
<body>
    <section>
        <div class="panel">
            <?php include_once("incl/menuPanel.php"); ?>
        </div>
        <div class="content">
            <div class="filter">
                <label for="">kategoria: </label>
                <select name="" id="">
                    <option value="default">nie wybrano</option>
                    <option value="RTV">RTV</option>
                    <option value="AGD">AGD</option>
                    <option value="PC">PC</option>
                </select>
            </div>
            <div class="list">

            </div>
        </div>
    </section>

    
    <script>
        const d = document

        const list = d.querySelector(".list")
        const getData = async () =>{
                const res = await fetch("deviceBase.php", {
                    method: 'get',
                    header: 'Content-Type: application/json'
                })
                if(!res.ok) throw new Error("Lol nie działa")
                const data = await res.json()
                Build(data)
            }
                
                
        
        window.addEventListener('load', getData)
        const Build = (data) => {
            console.log(typeof data)
            data.forEach(el => {
                let dev = CreateDevice(el)
                list.appendChild(dev)
            })
        }
        const CreateDevice = (data) => {
            let div = d.createElement("div")
            div.className = "device"
            let h2 = d.createElement("h2")
            h2.innerText = `${data.producent} ${data.model}`
           
            let ptab = [`Producent: ${data.producent}`,
            `Numer seryjny: ${data.nr_seryjny}`, `Kategoria: ${data.kategoria}`]
            div.appendChild(h2)
            ptab.forEach(el => {
                let p = d.createElement("p")
                p.innerText = el
                div.appendChild(p)
            })
            return div
        }
    </script>
</body>
</html>