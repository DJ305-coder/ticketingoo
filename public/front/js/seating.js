var bookings;
var zoom_count = 110;
var total_cost = 0;
var seats_status = {}
var seat_category;

var get_price_by_category = (key) => {
    for (var i in seat_category) {
        if (i > key) {
            // console.log(price)
            return price
        }
       var price = seat_category[i]
    }
    return price
}
const add_seat = (btn) => {
    // console.log(btn.id);
    let price = get_price_by_category(btn.id.slice(0, 1))
    console.log(price)
    if (!bookings.includes(btn.id)) {
        if (seats_status[btn.id] == 0) {
            btn.style.backgroundColor = "green";
            btn.style.color = "white";
            const seat_card = document.createElement("div");
            seat_card.innerHTML = showbookedseat(btn.id, price);
            seat_card.id = `${btn.id}_card`;
            total_cost += price;
            document.getElementById("totalprice").innerHTML = total_cost;
            document.getElementById("bookedseats").appendChild(seat_card);
            seats_status[btn.id] = 1;
        }
        else {
            btn.style.backgroundColor = "white";
            btn.style.color = "gray";
            total_cost -= price;
            document.getElementById("totalprice").innerHTML = total_cost;
            document.getElementById("bookedseats").removeChild(document.getElementById(`${btn.id}_card`));
            seats_status[btn.id] = 0;
        }

    } else {
        document.getElementById("already-booked").style.display = "block"
        setTimeout(function () { document.getElementById("already-booked").style.display = "none" }, 2000);
        ;
    }
};

const remove_seat = (btn) => {
    console.log(btn)
    btn.style.backgroundColor = "white";
    btn.style.color = "black";
    total_cost -= get_price_by_category(btn.id.slice(0, 1));
    document.getElementById("totalprice").innerHTML = total_cost;
    document.getElementById("bookedseats").removeChild(document.getElementById(`${btn.id}_card`));
    seats_status[btn.id] = 0;
}

const test = () =>{
    alert('tets');
}

const importJSON = (filename) => {
    var xhr = new XMLHttpRequest();
    xhr.overrideMimeType("application/json");
    xhr.open("GET", filename, false);
    xhr.send();
    if (xhr.status == 200) {
        return JSON.parse(xhr.responseText);
    }
}
const showbookedseat = (seatno, price) => {
    return '<div class="alert alert-info alert-dismissible fade show my-1" role="alert">' +
              '<strong>' + seatno + '</strong>' +
              '<br>' +
              '<small>₹' + price + '</small>' +
              '<button type="button" class="btn-close" onclick="remove_seat(' + seatno + ')" data-bs-dismiss="alert" aria-label="Close"></button>' +
          '</div>';
  }
  
const zoomin = () =>  {
    zoom_count += 20;
    document.getElementById("output").style.zoom = zoom_count + "%";
}
const zoomout = () => {
    zoom_count -= 20;
    document.getElementById("output").style.zoom = zoom_count + "%";
}
const booked_seat = (bookings) => {
    let seat;
    for (var id of bookings) {
        seat = document.getElementById(id);
        seat.style.backgroundColor = "gray";
        seat.style.color = "white";
        seats_status[id] = -1;
    }
}



import seatingData from './seatingdata_1.json' assert { type: "json" };

export default function showarrangement() {
    let btn, col, row, key, key2, width, counter, seatcounter, divider;
    let bg = "bg-warning";
    let theater_name = "thane_ram_ganesh_gadkari";
    // const theater_obj = importJSON("seatingdata_1.json");
    const theater_obj = seatingData;
    
    seat_category = theater_obj[theater_name]["categories"];
    console.log(seat_category)
    for (var i in theater_obj[theater_name]) {
        if (i in seat_category) {
            divider = document.createElement('div');
            divider.className = "row";
            divider.style.fontSize = "10px";
            divider.innerHTML = `<div class="col"><hr></div>
            <div class="col-auto" style="padding-top:8px">Booking charges ₹${seat_category[i]}/- per seat</div>
            <div class="col"><hr></div>`
            document.getElementById("output").appendChild(divider);
        }
        if (i == 'booking') {
            booked_seat(theater_obj[theater_name][i]);
            bookings = theater_obj[theater_name][i];

            break;
        }
        counter = 1;
        row = document.createElement("div");
        row.className = "d-flex justify-content-center flex-nowrap seat-row";
        // <p class="text-secondary m-1">A</p>
        key = document.createElement("div");
        key.innerHTML = `<b>${i}</b>`;
        key.className = "text-secondary m-1";
        row.appendChild(key);

        width = theater_obj[theater_name][i].reduce(function (total, value) { return total + value });
        // row.style.width= `${(width+2)*15}px`;
        // console.log((width + 2) * 15, width)
        seatcounter = 1;
        for (var j of theater_obj[theater_name][i]) {
            counter++;
            col = document.createElement("div");
            // console.log(theater_obj[theater_name][i].indexOf(j))
            if (counter % 2 == 0) {
                col.className = "";
            }
            else {
                col.className = "px-2";
            }

            for (let k = 0; k < j; k++) {
                const btn = document.createElement("div");
                btn.className = "chair";
                btn.id = i + seatcounter;
                seats_status[i + seatcounter] = 0;
                btn.innerHTML = seatcounter;
                btn.onclick = function() {
                    add_seat(this);
                };
                seatcounter++;
                col.appendChild(btn);
            }
            row.appendChild(col);
        }
        key2 = document.createElement("div");
        key2.innerHTML = `<b>${i}</b>`;
        key2.className = "text-secondary m-1";
        row.appendChild(key2);
        // console.log(row.offsetWidth);
       
        document.getElementById("output").appendChild(row);
    }
    document.getElementById('output-box').style.height = 230;
}


document.addEventListener("DOMContentLoaded", function(event) {
    showarrangement();
});