
function FrontPage_Form1_Validator(theForm)
{
   if (theForm.realname.value == "")
  {
    alert("Please type your Name");
    theForm.realname.focus();
    return (false);
  }
  
    if (theForm.email.value == "")
  {
    alert("Please type E-mail Address");
    theForm.email.focus();
    return (false);
  }
  
  //////////////////////  E-Mail  //////////////////////////////////////////////
// test if valid email address, must have @ and .
var checkEmail = "@.";
var checkStr = theForm.email.value;
var EmailValid = false;
var EmailAt = false;
var EmailPeriod = false;
for (i = 0;  i < checkStr.length;  i++)
{
ch = checkStr.charAt(i);
for (j = 0;  j < checkEmail.length;  j++)
{
if (ch == checkEmail.charAt(j) && ch == "@")
EmailAt = true;
if (ch == checkEmail.charAt(j) && ch == ".")
EmailPeriod = true;
	  if (EmailAt && EmailPeriod)
		break;
	  if (j == checkEmail.length)
		break;
	}
	// if both the @ and . were in the string
if (EmailAt && EmailPeriod)
{
		EmailValid = true
		break;
	}
}
if (!EmailValid)
{
alert("Please check your E-mail Address");
theForm.email.focus();
return (false);
}
//////////////////////  End  E-Mail  //////////////////////////////////////////////



 return (true);
}

//-->