<?php

ob_start();
$API = '1055674320:AAFHJgEyuUlQf4ChyHzKWX9Uo7l-5IaktEU';
define('API_KEY',$API);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$name = $message->from->first_name;
$Ch = "php_own"; //  Kanalingiz Userini
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$Ch&user_id=".$from_id);

if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendmessage',[
'chat_id'=>$chat_id,
    'text'=>"📛 Botdan to'liq foydalanish uchun @php_own kanalimizga az'o bo'ling! " ,
]);return false;}

if($text == "/start"){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"Bot sizga o'z ismingiz yozilgan profil rasm tayyorlab beradi. 

Boshlash uchun hoxlagan ismni yozib yuboring",
 'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>'true',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'Kanalga Azo Bo`lish','url'=>"https://t.me/PHP_OWN"]],
]])]);}

$Message = $update->message;
$Dev = $Message->text;
$ABoWatan = $Message->chat->id;
$Name = $Message->from->first_name;
if ($Dev != '/start'){
if(preg_match('/([a-z])|([A-Z])/i',$Dev)){
bot('sendMessage',[
            'chat_id'=>$ABoWatan,
'text'=>"💫 Hozr... ",
'reply_to_message_id'=>$Message->message_id,
]);
bot('sendphoto',[
 'chat_id'=>$ABoWatan, 

'photo'=>"https://netuzb.xvest.ru/Api2/index.php?text=$Dev",
'caption'=>"💫 $Dev ismiga atalgan profil rasmi tayyor bo'ldi
💫 @KaremaBot orqali yaratildi",
'reply_to_message_id'=>$Message->message_id,
 ]);
} else 
bot('sendMessage',[
    'chat_id'=>$ABoWatan,
    'text'=>"💫 O'zbekmizku, lotin hariflarida yozing, kirilchada shartmas",
'reply_to_message_id'=>$Message->message_id,
  ]);
  }