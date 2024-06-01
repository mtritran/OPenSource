let create = document.querySelector("#create");
let modal = document.querySelector("#create-computer");
let update_modal = document.querySelector("#update-computer");
let close = document.querySelector("#close")
let update_close = document.querySelector("#update_close")
let save = document.querySelector("#save");
let update = document.querySelector("#update");
let success = document.querySelector(".alert-success")
let error = document.querySelector(".alert-danger")


create.addEventListener("click", () => {
    modal.style.display = "flex";
});
close.addEventListener("click", () => {
    modal.style.display = "none";
})
update_close.addEventListener("click", () => {
    update_modal.style.display = "none";

})


// create Computer

save.addEventListener("click", async () => {
    try {
        let brand = document.querySelector("#brand").value;
        let name = document.querySelector("#name").value;
        let price = document.querySelector("#price").value;


        const res = await fetch("php/insert-data.php", {
            method: "POST",
            body: JSON.stringify({ "brand": brand, "name": name, "price": price }),
            headers: {
                "Content-Type": "application/json"
            }
        });
        const output = await res.json();

        if (output.success) {
            success.style.display = "flex";
            success.innerText = output.message;
            brand = "";
            name = "";
            price = "";
            modal.style.display = "none";
            getComputers();
            getTotalCount();
            setTimeout(() => {
                success.style.display = "none";
                success.innerText = "";

            }, 1000)

        } else {
            error.style.display = "flex";
            error.innerText = output.message;
            setTimeout(() => {
                error.style.display = "none";
                error.innerText = "";

            }, 1000)
        }
    } catch (error) {
        error.style.display = "flex";
        error.innerText = error.message;
        setTimeout(() => {
            error.style.display = "none";
            error.innerText = "";

        }, 1000)
    }
});

// select Computer

const getComputers = async () => {
    try {
        const tbody = document.querySelector("#tbody");
        let tr = "";
        const res = await fetch("php/select-data.php", {
            method: "GET",
            headers: {
                "Content-Type": "application/json"
            }
        });

        const output = await res.json();
        if (output.empty === "empty") {
            tr = "<tr>Record Not Found</td>"
        } else {
            for (var i in output) {
                tr += `
            <tr>
            <td>${parseInt(i) + 1}</td>
            <td>${output[i].brand}</td>
            <td>${output[i].name}</td>
            <td>${output[i].price}</td>
            <td><button onclick="editComputer(${output[i].id})" class="btn btn-success">Edit</button></td>
            <td><button onclick="deleteComputer(${output[i].id})"  class="btn btn-danger">Delete</button></td>
            </tr>`
            }
        }
        tbody.innerHTML = tr;
    } catch (error) {
        console.log("error " + error)
    }
}

getComputers();


// edit computers

const editComputer = async (id) => {
    update_modal.style.display = "flex";

    const res = await fetch(`php/edit-data.php?id=${id}`, {
        method: "GET",
        headers: { 'Content-Type': 'application/json' }
    })
    const output = await res.json();
    if (output["empty"] !== "empty") {
        for (var i in output) {
            document.querySelector("#id").value = output[i].id
            document.querySelector("#edit_brand").value = output[i].brand
            document.querySelector("#edit_name").value = output[i].name
            document.querySelector("#edit_price").value = output[i].price
        }
    }

}

// update computer

update.addEventListener("click", async () => {
    let id = document.querySelector("#id").value;
    let brand = document.querySelector("#edit_brand").value;
    let name = document.querySelector("#edit_name").value;
    let price = document.querySelector("#edit_price").value;

    const res = await fetch("php/update-data.php", {
        method: "POST",
        body: JSON.stringify({
            "id": id,
            "brand": brand,
            "name": name,
            "price": price
        })
    });

    const output = await res.json();
    if (output.success) {
        success.style.display = "flex";
        success.innerText = output.message;
        brand = "";
        name = "";
        price = "";
        update_modal.style.display = "none";
        getComputers();
        setTimeout(() => {
            success.style.display = "none";
            success.innerText = "";

        }, 1000)
    } else {
        error.style.display = "flex";
        error.innerText = output.message;
        setTimeout(() => {
            error.style.display = "none";
            error.innerText = "";
        }, 1000)
    }

})

// delete computer

const deleteComputer = async (id) => {
    const res = await fetch("php/delete-data.php?id=" + id, {
        method: "GET",
    });
    const output = await res.json();
    if (output.success) {
        success.style.display = "flex";
        success.innerText = output.message;
        setTimeout(() => {
            success.style.display = "none";
            success.innerText = "";
        }, 1000)
        getComputers();
        getTotalCount();
    } else {
        error.style.display = "flex";
        error.innerText = output.message;
        setTimeout(() => {
            error.style.display = "none";
            error.innerText = "";
        }, 1000)
    }
}

// get total count  computers;

const getTotalCount = async () => {
    let total = document.querySelector("#total");
    const res = await fetch("php/get-total-count.php", {
        method: "GET"
    })
    const output = await res.json();
    total.innerText = output;
}
getTotalCount();
