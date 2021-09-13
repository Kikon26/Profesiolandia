//bloqueaPantalla();
const baseUrl = $('#url').val();

//PETICION ASINCRONA GET
const asyncGetReq = async (datos, url) => {
    let params = Object.keys(datos).map(k => encodeURIComponent(k) + '=' + encodeURIComponent(datos[k])).join('&');
	let response = await fetch(`${url}${params}`);	
    if (!response.ok) //Si no es un 200 lanza un error
        throw Error(response.statusText);
    else
        return await response.json(); //Retorna una promesa
}

//$(function() {
! function($) {

  'use strict'; 
  //bloqueaPantalla();
  
  let method = 'CCalendario/Clientes?';
  let criterios = {d:'1'};
  
  asyncGetReq(criterios, baseUrl + method).then(data => 
  { //Funcion callback``
    
  if (data['clientes']) 
		{   
			var html = "<option value=''>Cliente</option>";                
			for (let i in data['clientes']) 
				{ 
					html += '<option value='+data['clientes'][i].id_cat_usuario+'  >'+								
								data['clientes'][i].nombre+'</option>';                   
				}    
			
			$('#id_cat_usuario').html(html);                 
            $('#id_cat_usuario').select2({
                dropdownParent: $('#Modal_Add'),
               
           });     
            
			
        }	

        $('#starttime').timepicker({ 
            'disableTimeRanges':[], 
            
              'minTime': '8:00am',
              'maxTime': '20:00pm',                    
              'timeFormat': 'H:i'  
          });                  

        $('#endtime').timepicker({ 
            'disableTimeRanges':[], 
            
            'minTime': '8:00am',
            'maxTime': '20:00pm',                    
            'timeFormat': 'H:i'  
        });   
     
        
	  desbloqueaPantalla();
  }).catch(e => { console.error(e); desbloqueaPantalla();});
	//fin dle proceso
  

     
  /***********************************************************************************************************************/
  /***********************************************************************************************************************/

  var CalendarApp = function() {
    this.$body = $("body")
    this.$calendar = $('#calendar_profesional'),
        this.$event = ('#calendar-events div.calendar-events'),
        this.$categoryForm = $('#add-new-event form'),
        this.$extEvents = $('#calendar-events'),
        this.$modal = $('#Modal_Add'),
        this.$saveCategoryBtn = $('.save-category'),
        this.$calendarObj = null
    };

    /* on drop */
    CalendarApp.prototype.onDrop = function(eventObj, date) 
    {
            var $this = this;
            // retrieve the dropped element's stored Event Object
            var originalEventObject = eventObj.data('eventObject');
            var $categoryClass = eventObj.attr('data-class');
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            if ($categoryClass)
                copiedEventObject['className'] = [$categoryClass];
            // render the event on the calendar
            $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                eventObj.remove();
            }
    },

    /* on click on event */
    CalendarApp.prototype.onEventClick = function(calEvent, jsEvent, view) 
    {
       
        var $this = this;
        /*var form = $("<form></form>");
        form.append("<label>Change event name</label>");
        form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.title + "' /><span class='input-group-btn'><button type='submit' class='btn btn-success waves-effect waves-light'><i class='fa fa-check'></i> Save</button></span></div>");
        
        $this.$modal.modal({
            backdrop: 'static'
        });
        
        
        $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function() {
            $this.$calendarObj.fullCalendar('removeEvents', function(ev) {
                return (ev._id == calEvent._id);
            });
            $this.$modal.modal('hide');
        });
        $this.$modal.find('form').on('submit', function() {
            calEvent.title = form.find("input[type=text]").val();
            $this.$calendarObj.fullCalendar('updateEvent', calEvent);
            $this.$modal.modal('hide');
            return false;
        });

        */        
        mostrar_detalle_cita(calEvent.id);        
    },

    /* on select */
    CalendarApp.prototype.onSelect = function(start, end, allDay) 
    {         
        var $this = this;        
        /*$this.$modal.modal({
            backdrop: 'static'
        });*/
        clean_inputs();

        $("#id_cat_dia").val(start.day());
        $("#id_cat_cita").val("-1");

        get_horario_atencion();        

        $('#label_action').html("Reservar Cita");        
        $("#FecInicio").val(moment(start).format('YYYY-MM-DD'));                                                 
        $("#FecTermino").val(moment(start).format('YYYY-MM-DD'));                                                 

        $("#starttime").val(moment(start).format('HH:mm:ss'));                                                 
        //$("#endtime").val(moment(start).format('HH:mm:ss'));                                                 
        $('#btn_delete').hide();
        $('#btn_save').html("Guardar");            
        $('#Modal_Add').modal('show');		
        $this.$calendarObj.fullCalendar('unselect');
    },
    CalendarApp.prototype.enableDrag = function() 
    {
        //init events
        $(this.$event).each(function() {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            });
        });
    }
    /* Initializing */
    CalendarApp.prototype.init = function() 
    {   
        this.enableDrag();
        /*  Initialize the calendar  */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());

     
        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar({
            slotDuration: '00:30:00',
            /* If we want to split day time each 15minutes */
            minTime: '08:00:00',
            maxTime: '20:00:00',
            defaultView: 'month',
            handleWindowResize: true,

            // hiddenDays: [ 2, 4 ],           

            validRange: function(nowDate) {
                return {
                  start: new Date(y, m, d+1)                  
                };
              },

            //   businessHours: {
            //     // days of week. an array of zero-based day of week integers (0=Sunday)
            //     dow: [ 1, 2, 3, 4, 5], // Monday - Thursday              
            //     startTime: '08:00', // a start time (10am in this example)
            //     endTime: '20:00', // an end time (6pm in this example)
            //   },
              selectConstraint: "businessHours",


            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: [],				  
            editable: false,            
            droppable: false, // this allows things to be dropped onto the calendar !!!
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            drop: function(date) { $this.onDrop($(this), date); },
            select: function(start, end, allDay) { $this.onSelect(start, end, allDay); },
            eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }

        });

        //***********************************************************************************************
        set_businessHours();
        render_events(); 

        
        //***********************************************************************************************        


        //on new event
        this.$saveCategoryBtn.on('click', function() 
        {
            var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
            var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
            if (categoryName !== null && categoryName.length != 0) {
                $this.$extEvents.append('<div class="calendar-events m-b-20" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="fa fa-circle text-' + categoryColor + ' m-r-10" ></i>' + categoryName + '</div>')
                $this.enableDrag();
            }

        });
    },

    //init CalendarApp
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp  

  /***********************************************************************************************************************/
  /***********************************************************************************************************************/





	
//});
}(window.jQuery),

//initializing CalendarApp
$(window).on('load', function() {

    //$.CalendarApp.init()
});


$("#form_reservar").on("submit", function()
    { 	
        var id_cat_cita=$("#id_cat_cita").val();
        var id_cat_profesional=$("#id_cat_profesional").val();
        var id_cat_usuario=$("#id_cat_usuario").val();
        var starttime=$("#starttime").val();
        var endtime=$("#endtime").val();

        var asunto = $("#asunto").val();           
        var categoryClass = $("#color").val();

        var fecha_hora_inicio= $("#FecInicio").val()+" "+$("#starttime").val()+":00";
        var fecha_hora_termino= $("#FecTermino").val()+" "+$("#endtime").val()+":00";
        
        let method_data_save = 'CCalendario/save';
        var post_url = baseUrl+method_data_save       
        
                
        $.ajax
        ({
            type: "POST",   
            dataType:'json',         
            url: post_url,           
            data : {"id_cat_cita":id_cat_cita,"id_cat_profesional":id_cat_profesional,"id_cat_usuario":id_cat_usuario,"asunto":asunto,"color":categoryClass,"start":fecha_hora_inicio,"end":fecha_hora_termino}, 
            success: function(data)
            { 
              if(id_cat_cita !="-1") 
               {
                    $("#calendar_profesional").fullCalendar('updateEvent', {
                        id:data['id_cat_cita'],
                        title: asunto,
                        start: fecha_hora_inicio,
                        end: fecha_hora_termino,
                        allDay: false,
                        className: categoryClass
                    });
                    console.log("updateee");
                }
                else     
                  console.log("newww");
                 
                /**************************************/ 
                 $('#calendar_profesional').fullCalendar('removeEvents');                 
                 render_events();                    
            }
        });    
        
        $('#Modal_Add').modal('hide');		
        
        return false;           
    });


    function mostrar_detalle_cita(id_cat_cita)
    {
        let method_detalle_cita = 'CCalendario/detalle_cita';
        var post_url = baseUrl+method_detalle_cita
        
        $('#id_cat_cita').val(id_cat_cita);

        $.ajax({
          url: post_url,
          type: 'POST',
          dataType: 'json',
          data : {"id_cat_cita":id_cat_cita}, 			
          success: function(response)
          {           
            $('#label_action').html("Editar Reservación");

            $('#id_cat_usuario').val(response.detalle_cita[0].id_cat_usuario);
            $('#id_cat_usuario').select2().trigger('change');     

            $('#FecInicio').val( moment(response.detalle_cita[0].start).format('YYYY-MM-DD'));
            
            $('#id_cat_dia').val( moment($('#FecInicio').val()).day() );
            get_horario_atencion();

            $('#FecTermino').val( moment(response.detalle_cita[0].end).format('YYYY-MM-DD'));

            $('#starttime').val( moment(response.detalle_cita[0].start).format('HH:mm'));
            $('#endtime').val( moment(response.detalle_cita[0].end).format('HH:mm'));

            $('#asunto').val(response.detalle_cita[0].asunto);
            $('#color').val(response.detalle_cita[0].color);
            $('#btn_save').html("Editar");            
            $('#btn_delete').show();
            $('#Modal_Add').modal('show');		
          }
        });   
        
    }    

    $('#btn_close').on('click', function(event) {        
        //clean_inputs();
        event.preventDefault(); // To prevent following the link (optional)
        
      });    

      function clean_inputs()
      {
        $('#id_cat_usuario').val("");                  
        $('#id_cat_usuario').select2().trigger('change');     

        $("#FecInicio").val("");
        $("#FecTermino").val("");
        $('#starttime').val("");
        $('#endtime').val("");
        $('#asunto').val("");				
        $('#color').val("");				
      }

      $('#btn_delete').on('click', function(event) {        
        
        var id_cat_cita=$("#id_cat_cita").val();        
        let method_data_delete = 'CCalendario/delete';
        var post_url = baseUrl+method_data_delete;
                
        $.ajax
        ({
            type: "POST",   
            dataType:'json',         
            url: post_url,           
            data : {"id_cat_cita":id_cat_cita}, 
            success: function(data)
            {	   
                Swal.fire({
                    title: 'Se elimino con exitó!',                        
                }).then((result) => {                
                    $('#calendar_profesional').fullCalendar('removeEvents');                 
                    render_events();    
                })	
                
            }
        });    
        
        $('#Modal_Add').modal('hide');		

        event.preventDefault(); // To prevent following the link (optional)
        
      });   

      $('#starttime').change(function(e) {	      
        
        $('#endtime').val( moment( $("#FecInicio").val()+" "+$("#starttime").val()+":00" ).add(30,"minutes").format('HH:mm'));
        return false;	
    });


    $('#FecInicio').change(function(e) {	      
        
        $('#FecTermino').val( $('#FecInicio').val() );             
        $('#id_cat_dia').val( moment($('#FecInicio').val()).day() );
        get_horario_atencion();
        return false;	
    });


function set_businessHours()
{
    let method_cita = 'CCalendario/get_dias_atencion';
    var post_url = baseUrl+method_cita;
            
    var id_cat_profesional=$("#id_cat_profesional").val();
                
    $.ajax({
        url: post_url,
        type: 'POST',
        dataType: 'json',
        data : {"id_cat_profesional":id_cat_profesional}, 			
        success: function(data)
        {                   

             let businessHours=[];

             len = data['get_dias_atencion'].length;
             for(var i=0; i<len; i++)
                {
                    var id_cat_dia = data['get_dias_atencion'][i].id_cat_dia;
                    businessHours.push(id_cat_dia);                                                                                                       
                } 

            console.log(businessHours);    
            $('#calendar_profesional').fullCalendar('option', {
                businessHours: [
                        {
                            dow: businessHours,
                            start: '09:00',
                            end: '11:00'
                        }             
                    ]
                });
        }
    });       
    
}


function render_events()
{
    let method_cita = 'CCalendario/Citas';
    var post_url = baseUrl+method_cita;
            
    var id_cat_profesional=$("#id_cat_profesional").val();
                
    $.ajax({
        url: post_url,
        type: 'POST',
        dataType: 'json',
        data : {"id_cat_profesional":id_cat_profesional}, 			
        success: function(data)
        {                   
            if(typeof(data['citas'][0]) != 'undefined' )
            { 
                for (let i in data['citas']) 
                {
                    var id_cat_cita=data["citas"][i].id_cat_cita;
                    var title=data["citas"][i].asunto;
                    var start=data["citas"][i].start;
                    var end=data["citas"][i].end;					  
                    var className= data["citas"][i].color
                    
                    var event={id:id_cat_cita,title: title,start:start,end:end,className:className};
                    $("#calendar_profesional").fullCalendar('renderEvent', event,true);   
                }
                
            }
        }
    });    
}      


function get_horario_atencion()
{
    let method_get_horario_atencion = 'CCalendario/get_horario_atencion';
    var post_url = baseUrl+method_get_horario_atencion;
            
    var id_cat_profesional=$("#id_cat_profesional").val();
    var id_cat_dia=$("#id_cat_dia").val();

    
    $.ajax({
        url: post_url,
        type: 'POST',
        dataType: 'json',
        data : {"id_cat_profesional":id_cat_profesional,"id_cat_dia":id_cat_dia}, 			
        success: function(data)
        { 
            if (data['horario_atencion'] != null) 
            {
                let disableTimeRanges=[];
                var len = data['horario_atencion']['before'].length;
                var range=[];
                for(var i=0; i<len; i++)
                {
                    // var min = data['horario_atencion'][i].min;
                    // var max = data['horario_atencion'][i].max;

                    var min = "00:00";
                    var max = data['horario_atencion']['before'][i].min;

                    if($("#id_cat_cita").val()=="-1") 
                      {
                          $("#starttime").val(  moment( $("#FecInicio").val()+" "+data['horario_atencion']['before'][i].min ).add(1,"minutes").format('HH:mm') );                                                 
                          $('#endtime').val( moment( $("#FecInicio").val()+" "+$("#starttime").val()+":00" ).add(30,"minutes").format('HH:mm'));
                      }    

                    range[i]=[min, max];
                    disableTimeRanges.push(range[i]);                                                                                   
                }                 
                
                
                len = data['horario_atencion']['after'].length;
                for(var i=0; i<len; i++)
                {
                    var min = data['horario_atencion']['after'][i].max;
                    var max = "23:59";

                    range[i]=[min, max];
                    disableTimeRanges.push(range[i]);                                                                                                       
                } 
                
                if (data['horario_atencion']['citas'] != null) 
                {
                    len = data['horario_atencion']['citas'].length;
                    for(var i=0; i<len; i++)
                    {
                        var min = data['horario_atencion']['citas'][i].min;
                        var max = data['horario_atencion']['citas'][i].max;

                        range[i]=[min, max];
                        disableTimeRanges.push(range[i]);                                                                                   
                      
                    } 
                }    
                
                $('#starttime').timepicker('option', 'disableTimeRanges', disableTimeRanges); 
                $('#endtime').timepicker('option', 'disableTimeRanges', disableTimeRanges); 
            }   
        }
    });
}


