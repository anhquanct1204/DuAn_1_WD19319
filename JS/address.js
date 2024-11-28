// 1. what is API
// 2. How do I call API
// 3. Explain code
const host = "https://provinces.open-api.vn/api/";

var callAPI = (api) => {
    return axios.get(api)
        .then((response) => {
            renderData(response.data, "province");
        });
}

callAPI('https://provinces.open-api.vn/api/?depth=1');
var callApiDistrict = (api) => {
    return axios.get(api)
        .then((response) => {
            renderData(response.data.districts, "district");
        });
}
var callApiWard = (api) => {
    return axios.get(api)
        .then((response) => {
            renderData(response.data.wards, "ward");
        });
}

var renderData = (array, select) => {
    let row = ' <option disable value="">Chọn địa điểm</option>';
    array.forEach(element => {
        row += `<option value="${element.code}">${element.name}</option>`
    });
    document.querySelector("#" + select).innerHTML = row ;
}

// $("#province").change(() => {
//     callApiDistrict(host + "p/" + $("#province").val() + "?depth=2");
//     printResult();
// });

$("#province").change(() => {
    // Lấy văn bản (text) của thẻ option đã chọn
    const selectedOption = $("#province option:selected").text();
    // Hiển thị văn bản trong một phần tử (ví dụ: div) hoặc làm gì đó khác
    document.querySelector("#province_insert").value =  selectedOption;

    callApiDistrict(host + "p/" + $("#province").val() + "?depth=2");
    printResult();
});


$("#district").change(() => {
    // Lấy văn bản (text) của thẻ option đã chọn
    const selectedOption = $("#district option:selected").text();
    // Hiển thị văn bản trong một phần tử (ví dụ: div) hoặc làm gì đó khác
    document.querySelector("#district_insert").value =  selectedOption;
    callApiWard(host + "d/" + $("#district").val() + "?depth=2");
    printResult();
});
$("#ward").change(() => {
    // Lấy văn bản (text) của thẻ option đã chọn
    const selectedOption = $("#ward option:selected").text();
    // Hiển thị văn bản trong một phần tử (ví dụ: div) hoặc làm gì đó khác
    document.querySelector("#ward_insert").value =  selectedOption;
    printResult();
}) ;



// const province = document.getElementById('province') ,
//     district = document.getElementById('district'),
//     ward = document.getElementById('ward') ,
//     province_insert = document.getElementById('province_insert') ,
//     district_insert = document.getElementById('district_insert') ,
//     ward_insert = document.getElementById('ward_insert') ;

//     province.onchange = function() {
//         var selectedOption = province.options[province.selectedIndex];
//         var optionText = selectedOption.text;
//         province_insert.value =  optionText;
//     };
// var printResult = () => {
//     if ($("#district").val() != "" && $("#province").val() != "" &&
//         $("#ward").val() != "") {
//         let result = $("#province option:selected").text() +
//             " | " + $("#district option:selected").text() + " | " +
//             $("#ward option:selected").text();
//         $("#result").text(result)
//     }
// }