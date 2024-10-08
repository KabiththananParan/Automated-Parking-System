function searchParking() {
    let input = document.getElementById('searchInput').value.toUpperCase();
    let parkingList = document.getElementById('parkingList');
    let parkingAreas = parkingList.getElementsByClassName('parking-area');

    for (let i = 0; i < parkingAreas.length; i++) {
        let span = parkingAreas[i].getElementsByTagName("span")[0];
        let txtValue = span.textContent || span.innerText;

        if (txtValue.toUpperCase().indexOf(input) > -1) {
            parkingAreas[i].style.display = "";
        } else {
            parkingAreas[i].style.display = "none";
        }
    }
}