function do_saveBracketPosition_cb(data) 
{
	alert("Got here");
}

function do_saveBracketPosition(bp, teamId, year) 
{
	x_saveBracketPosition(bp, teamId, year, do_saveBracketPosition_cb);
}

function getElementValue(id)
{
   element = document.getElementById(id);
   if(element != null)
       return element.value;
   else
   {
       alert("Field " + id + " could not be found.");
       return "";
   }
}

function setElementValue(id, value)
{
   element = document.getElementById(id);
   if(element != null)
       element.value = value;
   else
       alert("Field " + id + " could not be found.");
}

function saveBP2(bp, seed)
{
    var sRtn;
    var index;
    var name;
    var teamId;
    var id;
    var field;
    var label;
    var elTarget;
    
    elTarget = document.getElementById(bp);

  if (window.showModalDialog)
  {    
    // Open a popup dialog to help the user find a college quicker.
    sRtn = showModalDialog("teams.php","","center=yes;dialogWidth=450pt;dialogHeight=200pt");
  }
  else
   	sRtn = window.open('teams.php','','height=200,width=450,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,modal=yes');

  if (sRtn!="")
  {
     index = sRtn.indexOf(":");
     index++;
     name = sRtn.substring(index, sRtn.length);
     index--;
     teamId = sRtn.substring(0, index);
     label = seed + " - " + name;
     elTarget.replaceAdjacentText("afterBegin", label);
     do_saveBP(bp, teamId, "");
   }
	else
	  alert(name + " already exists on the bracket.");
}

var currentBP, currentSeed;
function saveBP(bp, seed) {
  currentBP = bp;
  currentSeed = seed;
  teamsPanel.setHeader('Choose:');
  if (32 >= bp) {
    teamsPanel.cfg.setProperty('context', ['bp_' + bp, 'tl', 'tr']);
  } else {
    teamsPanel.cfg.setProperty('context', ['bp_' + bp, 'tr', 'tl']);
  }
  teamsPanel.cfg.setProperty('visible', true);
  teamList.scrollTop = 0;
}

var teamsPanel, teamList;
$(function() {
  teamList = $('#teamList')[0];
  
  teamsPanel = new YAHOO.widget.Panel('teamsPanel', { visible: false, constraintoviewport: true, close: true, draggable: false, underlay: "shadow", width: "450px" });
  teamsPanel.render();

  // wire up all the teams in the list
  $('.teamLink').each( function() {
  	$(this).click( function() {
      teamsPanel.cfg.setProperty('visible', false);
      $('#bp_' + currentBP).text($(this).text() + " (" + currentSeed + ")");
      $(this).remove();
      return false;
  	});
  });
  
  // wire up all the letters to scroll the box
  $('.letterLink').click( function() {
    teamList.scrollTop = $('#' + $(this).text() + '-teams')[0].offsetTop - 48; // where did 48 come from?
    return false;
  });
});
