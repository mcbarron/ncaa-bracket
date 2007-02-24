var year = new Date().getFullYear();

function do_saveBracketPosition_cb(data) 
{
	if (!data) alert (data);
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
  $('a.teamLink').click( function(event) {
    teamsPanel.cfg.setProperty('visible', false);
    $('#bp_' + currentBP).text("(" + currentSeed + ") " + $(this).text());
    do_saveBracketPosition(currentBP, this.id.split('-')[1], year);
    $(this).remove();
    return false;
  });
  
  // wire up all the letters to scroll the box
  $('a.letterLink').click( function(event) {
    teamList.scrollTop = $('#' + $(this).text() + '-teams:first')[0].offsetTop - 48; // where did 48 come from?
    return false;
  });
});
