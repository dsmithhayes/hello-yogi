<?php
/**
 * @package Hello_Yogi
 * @version 1.0
 */
/*
Plugin Name: Hello, Yogi
Plugin URI: http://davesmithhayes.com
Description: A fork of the ever so popular Hello Dolly plugin for WordPress, but with Yogi Berra quotes.
Author: Dave Smith-Hayes, Matt Mullenweg
Version: 1.0
Author URI: http://davesmithhayes.com/
*/

function yogi_berra_quotes() {
  $lyrics = "When you come to a fork in the road, take it.
You can observe a lot by just watching.
It ain’t over till it’s over.
It’s like déjà vu all over again.
No one goes there nowadays, it’s too crowded.
Baseball is 90% mental and the other half is physical.
A nickel ain’t worth a dime anymore.
Always go to other people’s funerals, otherwise they won’t come to yours.
We made too many wrong mistakes.
Congratulations. I knew the record would stand until it was broken.
You better cut the pizza in four pieces because I’m not hungry enough to eat six.
You wouldn’t have won if we’d beaten you.
I usually take a two-hour nap from one to four.
Never answer an anonymous letter.
Slump? I ain’t in no slump… I just ain’t hitting.
How can you think and hit at the same time?
The future ain’t what it used to be.
I tell the kids, somebody’s gotta win, somebody’s gotta lose. Just don’t fight about it. Just try to get better.
It gets late early out here.
If the people don’t want to come out to the ballpark, nobody’s going to stop them.
We have deep depth.
Pair up in threes.
Why buy good luggage, you only use it when you travel.
You’ve got to be very careful if you don’t know where you are going, because you might not get there.
All pitchers are liars or crybabies.
Even Napoleon had his Watergate.
Bill Dickey is learning me his experience.
He hits from both sides of the plate. He’s amphibious.
It was impossible to get a conversation going, everybody was talking too much.
I can see how he (Sandy Koufax) won twenty-five games. What I don’t understand is how he lost five.
I don’t know (if they were men or women fans running naked across the field). They had bags over their heads.
I’m a lucky guy and I’m happy to be with the Yankees. And I want to thank everyone for making this night necessary.
I’m not going to buy my kids an encyclopedia. Let them walk to school like I did.
In baseball, you don’t know nothing.
I never blame myself when I’m not hitting. I just blame the bat and if it keeps up, I change bats. After all, if I know it isn’t my fault that I’m not hitting, how can I get mad at myself?
I never said most of the things I said.
It ain’t the heat, it’s the humility.
If you ask me anything I don’t know, I’m not going to answer.
I wish everybody had the drive he (Joe DiMaggio) had. He never did anything wrong on the field. I’d never seen him dive for a ball, everything was a chest-high catch, and he never walked off the field.
So I’m ugly. I never saw anyone hit with his face.
Take it with a grin of salt.
(On the 1973 Mets) We were overwhelming underdogs.
The towels were so thick there I could hardly close my suitcase.
Little League baseball is a very good thing because it keeps the parents off the streets.
Mickey Mantle was a very good golfer, but we weren’t allowed to play golf during the season; only at spring training.
You don’t have to swing hard to hit a home run. If you got the timing, it’ll go.
I’m lucky. Usually you’re dead to get your own museum, but I’m still alive to see mine.
If I didn’t make it in baseball, I won’t have made it workin’. I didn’t like to work.
If the world were perfect, it wouldn’t be.
A lot of guys go, ‘Hey, Yog, say a Yogi-ism.’ I tell ’em, ‘I don’t know any.’ They want me to make one up. I don’t make ’em up. I don’t even know when I say it. They’re the truth. And it is the truth. I don’t know.";

  // Here we split it into lines
  $lyrics = explode("\n",$lyrics);

  // And then randomly choose a line
  return "\"" . wptexturize($lyrics[mt_rand(0, count($lyrics) - 1)]) . "\"";
}

// This just echoes the chosen line, we'll position it later
function yogi_quote() {
  $chosen = yogi_berra_quotes();
  echo "<p id='yogi'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action('admin_notices', 'yogi_quote');

// We need some CSS to position the paragraph
function yogi_css() {
  // This makes sure that the positioning is also good for right-to-left languages
  $x = is_rtl() ? 'left' : 'right';

  echo "<style type='text/css'>
  #yogi {
    float: {$x};
    padding-{$x}: 15px;
    padding-top: 5px;
    margin: 0;
    font-size: 11px;
  }
  </style>";
}

add_action('admin_head', 'yogi_css');

?>
