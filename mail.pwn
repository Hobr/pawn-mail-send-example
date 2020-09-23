#include <a_samp>
#include <a_http>
forward EmailDelivered(index, response_code, data[]); 

public EmailDelivered(index, response_code, data[])
{
    if(response_code == 200)
    {
        /* return data
            Success:1
            Fail: ERROR:{Message}
        */
    }
    else
    {
        // send post fails. response_code https://wiki.sa-mp.com/wiki/HTTP
    }
    return 1;
}

// Send
new string[256];
format(string,sizeof(string), "http://xxxxx.com/mail.php?mail=%s&name=%s&number=%d",ToAddress,PlayerName,VerifyCode);
HTTP(playerid, HTTP_GET,string, " ", "EmailDelivered");