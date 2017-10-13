<?php

include_once('cat.php');
include_once('user.php');

if (@fopen('../htdocs/private/cat.csv', 'r') === false)
{
	add_cat(Array('Classique'));
	add_cat(Array('Rare'));
	add_cat(Array('Ultra Rare'));
	add_cat(Array('Don\'t Click Here'));
	echo "OK\n";
}
if (@fopen('../htdocs/private/user.csv', 'r') === false)
{
	add_user(Array('admin', get_h_password('admin'), 'true'));
	echo "OK\n";
}
if (@fopen('../htdocs/private/prod.csv', 'r') === false)
{
	add_prod(Array('Original', 'Classique', '5', 'http://i0.kym-cdn.com/photos/images/facebook/000/862/065/0e9.jpg'));
	add_prod(Array('Regard Vide', 'Classique', '3', 'https://ichef-1.bbci.co.uk/news/660/cpsprodpb/16620/production/_91408619_55df76d5-2245-41c1-8031-07a4da3f313f.jpg'));
	add_prod(Array('Confiant', 'Classique', '5', 'https://media4.s-nbcnews.com/j/msnbc/components/video/201609/a_ov_pepe_160928.nbcnews-ux-1080-600.jpg'));
	add_prod(Array('Triste', 'Classique', '4', 'http://img.lemde.fr/2017/05/08/0/0/640/480/534/0/60/0/cae6f1e_9323-wpojhb.8ba3v7vi.jpg'));
	add_prod(Array('Curieux', 'Classique', '5', 'https://image.spreadshirtmedia.com/image-server/v1/mp/compositions/P1012780393MPC1021142932/views/1,width=300,height=300,appearanceId=1,backgroundColor=E8E8E8,version=1478262588/starry-eyed-pepe-women-s-t-shirt.jpg'));
	add_prod(Array('Full Body', 'Classique', '6', 'https://ih0.redbubble.net/image.145587306.3544/flat,800x800,075,f.u1.jpg'));
	add_prod(Array('Pepe Floyd', 'Rare', '10', 'https://bitcoinist.com/wp-content/uploads/2016/10/Rare-Pepe-Illuminati.png'));
	add_prod(Array('Pepe Beau Gosse', 'Rare', '10', 'https://pbs.twimg.com/profile_images/746565144252125188/U6TG7cHF.jpg'));
	add_prod(Array('Pepe Realiste', 'Rare', '15', 'https://pbs.twimg.com/profile_images/874752484752859136/JOwA67bM.jpg'));
	add_prod(Array('Pepe de l\'espace', 'Rare', '20', 'https://i.pinimg.com/736x/76/ec/d0/76ecd0fbbb0a4f0ae058a284afcba4ee--meme-party-pepe-rarest.jpg'));
	add_prod(Array('Pepe 420', 'Rare', '25', 'http://data.whicdn.com/images/187450079/superthumb.jpg'));
	add_prod(Array('Dragon', 'Rare', '25', 'http://i0.kym-cdn.com/photos/images/facebook/000/945/876/f91.png'));
	add_prod(Array('Pepe le plus rare', 'Ultra Rare', '10000', 'http://i0.kym-cdn.com/photos/images/original/000/961/997/c83.jpg'));
	add_prod(Array('Sexy Pepe', 'Ultra Rare', '10000', 'https://static2.fjcdn.com/comments/My+rarest+pepe+_6d27ff1dedb7a37261360800bb57fbc1.jpg'));
	add_prod(Array('Pepe Flippant', 'Ultra Rare', '10000', 'http://static.fjcdn.com/pictures/Rare_d574f6_5507279.jpg'));
	add_prod(Array('Come To Pepe', 'Don\'t Click Here', '666', 'http://data.whicdn.com/images/243369834/original.jpg'));
	add_prod(Array('Come To Pepe ', 'Don\'t Click Here', '666', 'http://data.whicdn.com/images/243369834/original.jpg'));
	add_prod(Array('Come To Pepe  ', 'Don\'t Click Here', '666', 'http://data.whicdn.com/images/243369834/original.jpg'));
	add_prod(Array(' Come To Pepe  ', 'Don\'t Click Here', '666', 'http://data.whicdn.com/images/243369834/original.jpg'));
	add_prod(Array('  Come To Pepe', 'Don\'t Click Here', '666', 'http://data.whicdn.com/images/243369834/original.jpg'));
	add_prod(Array('   Come To Pepe   ', 'Don\'t Click Here', '666', 'http://data.whicdn.com/images/243369834/original.jpg'));
	echo "OK\n";
}
