/*The MIT License (MIT)

Copyright (c) 2017 www.netprogs.pl

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.*/
$.datepicker.regional['pl'] = {
    closeText: "Zamknij",
    prevText: "&#x3C;Poprzedni",
    nextText: "Następny&#x3E;",
    currentText: "Dziś",
    monthNames: ["Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec",
        "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"],
    monthNamesShort: ["Sty", "Lu", "Mar", "Kw", "Maj", "Cze",
        "Lip", "Sie", "Wrz", "Pa", "Lis", "Gru"],
    dayNames: ["Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota"],
    dayNamesShort: ["Nie", "Pn", "Wt", "Śr", "Czw", "Pt", "So"],
    dayNamesMin: ["N", "Pn", "Wt", "Śr", "Cz", "Pt", "So"],
    weekHeader: "Tydz",
    dateFormat: "yy-mm-dd",
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ""
};

$.datepicker.setDefaults($.datepicker.regional['pl']);


$(function () {
    $(".datepicker").datepicker();
});


$(function () {
    $(".autocomplete").autocomplete({
        source: ["Matematyka", "Fizyka", "Chemia", "Biologia", "Geografia"],
        minLength: 2,
        select: function (event, ui) {
            console.log(ui.item.value);

        }


    });
});



//room.php
var eventDates = {};
var dates = ['09/22/2017', '09/25/2017', '09/29/2017'];
for (var i = 0; i < +dates.length; i++)
{
    eventDates[ new Date(dates[i])] = new Date(dates[i]);
}


$(function () {
    $("#avaiability_calendar").datepicker({
        onSelect: function (data) {

            console.log($('#dayin').val());

            if ($('#dayin').val() == '')
            {
                $('#dayin').val(data);
            } else if ($('#dayout').val() == '')
            {
                $('#dayout').val(data);
            } else if ($('#dayout').val() != '')
            {
                $('#dayin').val(data);
                $('#dayout').val('');
            }

        },
        beforeShowDay: function (date)
        {
            //console.log(date);
            if (eventDates[date])
                return [false, 'unavaiable_date'];
            else
                return [true, ''];
        }


    });
});
