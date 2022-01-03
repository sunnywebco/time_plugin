<?php
/*
Plugin Name: وب سرویس زمان-سانی وب
Plugin URI:  https://api.sunnyweb.ir
Description:  نمایش اطلاعات زمانی از قبیل زمان های شمسی ، قمری ، میلادی 
Version:     1.1.0
Author:      تیم برنامه نویسی سانی وب
Author URI:  http://sunnyweb.ir
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

//add menu
add_action('admin_menu', 'SUN_TIME_API_MENU');

function SUN_TIME_API_MENU()
{
    //create new top-level menu
    add_menu_page('time', 'نمایش اطلاعات زمانی از قبیل زمان های شمسی ، قمری ، میلادی ', 'administrator', __FILE__, 'time_plugin_settings_page', plugins_url('/images/logo.png', __FILE__));
    //call register setting fann_get_cascade_activation_function
    add_action('admin_init', 'SUN_TIME_API');
}
//end add menu

//create cols in db
function SUN_TIME_API()
{
    register_setting('SUN_API_', 'api');
}
//end create cols in db

//select cols in db
$api_e = esc_attr(get_option('api'));
//end select cols in db

function SUN_TIME_API_RES($atts)
{
    global $api_e;
    $json = json_decode(file_get_contents('https://api.sunnyweb.ir/api/time/' . $api_e), true);
    $miladiYear = $json['gregorianYear'];
    $miladiMonth = $json['gregorianMonth'];
    $miladiDay = $json['gregorianDay'];
    $miladiDayName = $json['gregorianDayName'];
    $jalaliYear = $json['jalaliYear'];
    $jalaliMonth = $json['jalaliMonth'];
    $jalaliDay = $json['jalaliDay'];
    $jalaliDayName = $json['jalaliDayName'];
    $hjriYear = $json['hijriYear'];
    $hjriMonth = $json['hijriMonth'];
    $hjriDay = $json['hijriDay'];
    $hijriDayName = $json['hijriDayName'];
    $miladiMonthName = $json['gregorianMonthName'];
    $jalaliMonthName = $json['jalaliMonthName'];
    $hjriMonthName = $json['hijriMonthName'];

    echo '
    <div dir="rtl" class="container">
        <div style="margin-top:.5em; margin-bottom:.5em; text-align:center;" >
        <h5 style="color:red;">خورشیدی</h5>
        <p>
        ' . $jalaliDayName . '،' . $jalaliDay . ' ' . $jalaliMonthName . ' ' . $jalaliYear . '
        </p>
        <p>
        ' . $jalaliYear . '/' . $jalaliMonth . '/' . $jalaliDay . '
        </p>
        </div>

        <div style="margin-top:.5em; margin-bottom:.5em; text-align:center;" >
        <h5 style="color:red">میلادی</h5>
        <p dir="ltr">
        ' . $miladiDayName . ',' . $miladiDay . ' ' . $miladiMonthName . ',' . $miladiYear . '
        </p>
        <p>
        ' . $miladiYear . '/' . $miladiMonth . '/' . $miladiDay . '
        </p>
        </div>

        <div style="margin-top:.5em; margin-bottom:.5em; text-align:center;" >
        <h5 style="color:red">قمری</h5>
        <p>
        ' . $hijriDayName . '،' . $hjriDay . ' ' . $hjriMonthName . ' ' . $hjriYear . '
        </p>
        <p>
        ' . $hjriYear . '/' . $hjriMonth . '/' . $hjriDay . '
        </p>
        </div>
    </div>
    ';
}

//SHORT CODE
add_shortcode('SUN_TIME', 'SUN_TIME_API_RES');
//END SHORT CODE

function time_plugin_settings_page()
{
?>
    <div class="wrap">
        <h1>نمایش اخبار ارز دیجیتال</h1>
        <p>برای تهیه توکن سانی وب می توانید به <a href="https://api.sunnyweb.ir" target="_blank">اینجا</a> مراجعه و اشراک خود را تهیه نمایید</p>
        <form method="post" action="options.php">
            <?php settings_fields('SUN_API_'); ?>
            <?php do_settings_sections('SUN_API_'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">توکن کلید وب سرویس</th>
                    <td><input type="text" name="api" style="width: 30%;" value="<?php echo esc_attr(get_option('api')); ?>" /></td>
                </tr>
            </table>
            <h2>راهنما</h2>
            <p> جهت نمایش جدول از شورت کد [SUN_TIME] استفاده نمایید</p>
            <?php submit_button(); ?>
        </form>
    </div>
<?php } ?>
}