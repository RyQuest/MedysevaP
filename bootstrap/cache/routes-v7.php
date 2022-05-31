<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1cd5Ch9UKzuR0wT6',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9VOPhlCXgJkHEbCR',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/patient/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SSjfSTp6dbJYAj4X',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/patient/save' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::D1LZJ5Q632hDGKeA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/company/getall' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Tc1ayxF5ZlFOyBQh',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/company/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yXQkQP9hv6gSzSg6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/importp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4PZDic7Ksizq6QGX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ckvPCJdmCbyz4x8P',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/patient/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0UOPHSxlFnvSEFuO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/patient/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WRgEWtGYBYPraqbw',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/patient/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::on16QDxB4Gi4QS4F',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/patient/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::F9eJrTdDQMWmEsqK',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LhhmRIvz3qs1ViKV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/contact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zji5dop5yFfB9a8q',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jt3wKJXQCT3eJyNv',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/patient/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WNATtqjvjqiYdHt4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/patient/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::i0gwvRDkXDTm0YbS',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/patient/changepass' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8EyiXcMqW7LCzxrt',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/patient/appointments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7e36DQZc0x7oQo13',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lBAXudo7uYbEKb3G',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/profile/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HyEquqPeLBR4TiEC',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/education/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M2FlW1hs3zUHS8nv',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/education/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qHHb8R5GvHt3q4Uz',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/education/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LWVyHOxJDLkU6KUj',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/experience/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6i92T0uVZga8ppAt',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/experience/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sxnPAoNU9DYdShKt',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/experience/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mrFuvYOmWWx3ovnY',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/prescriptions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HGgL849VawJEmRvI',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/prescription/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XnbFE3zH5taLfokk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/prescription/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UgIrIciOK2rSqbUk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/diagonosis' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dlx8AZ5DIdN4OWmT',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/additional_advises' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7gELCUA89cabvkYr',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/advises' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OlKU7B6xmEnl2UsP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/advise_investigations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fuEz2N6NW24A00xV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/drugs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::InjqkLD76gUZwtBM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/drug/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FXAi4BNB1vqSUEYe',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/patientses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::luD0iANwoLEYnjXl',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SGBrxPdYr5Gzdbz6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/appointments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JGsxCzpc8Bgg6h92',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/appointment/list/by_date' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zl2IkGY8jVodBhxU',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/appointment/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dgKAo2Nch322COBy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/appointment/schedule' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5ZrJkmRiQIoCmz0O',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/appointment/schedule/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oWoJ6uR07EeAx8M9',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/live_consults' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eqJsMp0Sma5tCkCF',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/doctor/live_consult/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tn5SyXeWdnDeARUb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/vle/getall' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0eKKLHk0DPabRsAV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/vle/chambers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KJok0FTPDz9v23Vt',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/vle/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZNpXHK0f2nN0eNYU',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/vle/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hik2GfqoDB9YRjkk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/vle/session' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vWzu09Fx8pTBfa3M',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/vle/session/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jJxVaspB4EdRadru',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/wallet/getall' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::v8OyoHnTFK3kewgw',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/wallet/transactions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zFa4Ov6nRwF7FCeO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/wallet/transactions/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TvoFZCdzFLww3e2v',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/wallet/request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sKDviEj61880jM0T',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/wallet/request/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ok39RVFv9UJW0er3',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/wallet/request-approval-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::v173JmryW2izLEW5',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/wallet/request/approve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lwdTpfZbLtpuBcy3',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/wallet/request/reject' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Vcewi96q1ng1Ldc9',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/wallet/request/reason' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Hxq8K21lqtIblL2Z',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/wallet/topup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cmYQaFBpgvEwJuoo',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/wallet/topup/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ve9QjDoHYggHfk5z',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/wallet/topupRequestReject' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Lnyo4ACbDvdrv7BA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/wallet/approveTopupRequest' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4hpx6iHhb79mvK0i',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/invoice/getall' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::H4L6udaNSoqZ8ohs',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/invoice/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::b8XRhyv2Zpqg2oZA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/invoice/nict' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gK0k5dr6xUW2uSd3',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/nict/invoice/transactions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1pS6utnuSa5eMhbr',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vle/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M0lpYQuO0vZpBM9g',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vle/appointment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BhkZaFwbFOWGH5BN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vle/appointment/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yOBOzAsyMC97QNNj',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vle/invoice' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sultJchDK2us83ZK',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vle/wallet' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::q005QUgaFlIbJ2sW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vle/withdraw_request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hUPnGyjkDKVVS0mN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vle/withdraw_request/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NeM6m2OJ2XjFWrxp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/staff/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0Wf7kvpt2XNK4P3h',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/staff/appointment/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::O0AqCXmiHvcACQId',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/staff/appointment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::baE10zBVS5Sup9ma',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/staff/patient' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2zullCGdPS7wUfvZ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/staff/patient/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::r31oo7XFsCviJGEO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/staff/patient/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6x7i3SnzSTMqmHxt',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/staff/patient/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LSfiEGWlZGuBebCU',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/join_us' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XICOgbzs4dZDk3Be',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/contact_us' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::F3I3cu4Kwa23BRdh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Io0shI9ePebVl2gB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/route-cache' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2Ne8i6s3yL2pDlZK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/config-cache' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fYQBTu6brzdpJbrN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clear-cache' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2u8tS1pdVCZDZOAl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/view-clear' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cK0B0V1QsxTwKFqI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dump-autoload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Q8LEZJrMHsnmvQol',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Cw5NFslczMzNk8sT',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Xlhe4giJIHrI60nV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tBoaj9XuDa2vMJB2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Hwwaofvk5BwqeBwE',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/testemai' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vLebKNmnMRTImPM0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/speciality' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zubaivmspKdkWjMb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/appointment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pyLsjkr3EWpwQnZz',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/signin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GPqVje8FwDaeqwgS',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user-login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-password-forgot',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-resetPassword',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/vle-graph' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.dashboardVleGraph',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/clinic-graph' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.$monthData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.password',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.passwordUpdate',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/invoice' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.invoices',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/invoice/nict' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.nict',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/invoice/request-amount' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.request-amount',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/invoice/transactions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.transactions',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/vle' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.vle',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/vle/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.vleAdd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/vle/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.vleCreate',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/vle/session' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.VleSession',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/patient' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.patient',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/wallet' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.wallet',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/wallet/request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.withdrawRequest',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/wallet/request-approval-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.approvalConfirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/wallet/request/approve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.withdrawRequestApprove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/wallet/request/reject' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.withdrawRequestReject',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/wallet/request/reason' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.viewRejectReason',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/wallet/transactions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.walletTransactions',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/wallet/my-topup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.MytopupRequest',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/wallet/applyTopup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.applyTopup',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/wallet/my-withdraw' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.MywithdrawRequest',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/wallet/apply-withdraw' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.applyWithdraw',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/wallet/topup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.topupRequest',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/wallet/topupRequestReject' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.topupRequestReject',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/wallet/approveTopupRequest' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.approveTopupRequest',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/api/(?|get(?|totalscansfrommobile/([^/]++)(*:50)|healthframefromscanidandCID/([^/]++)/([^/]++)(*:102))|company/(?|edit/([^/]++)(*:135)|update/([^/]++)(*:158)|delete/([^/]++)(*:181)|getbyCIN/([^/]++)(*:206))|patient/profile/update/([^/]++)(*:246)|vle/invoice/details/([^/]++)(*:282)|staff/patient/details/([^/]++)(*:320))|/pa(?|ssword/reset/([^/]++)(*:356)|tient/view/([^/]++)(*:383))|/invoice/view/([^/]++)(*:414)|/vle/(?|view/([^/]++)(*:443)|session/([^/]++)/([^/]++)(*:476))|/wallet/(?|request/view/([^/]++)(*:517)|t(?|ransactions/view/([^/]++)(*:554)|opup/([^/]++)(*:575))))/?$}sDu',
    ),
    3 => 
    array (
      50 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LsPHzxrz1PZXccHl',
          ),
          1 => 
          array (
            0 => 'mobile',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      102 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZM7HBTwHRt4LxFVe',
          ),
          1 => 
          array (
            0 => 'scan_id',
            1 => 'mobile',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      135 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WkN4r5gPMFrQ53sy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      158 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gzAySyeymjkHtu0z',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      181 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vL4dfSK6wzwd7c2O',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      206 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SAT0GwsEfsj7xC47',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      246 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5ItQPY6xhUdC6W0R',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      282 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qtXaPGIdhedDiCas',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      320 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sKKDbDvhN4fnldYF',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      356 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      383 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.patientView',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      414 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.invoiceView',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      443 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.vleView',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      476 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.viewVleSession',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'date',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      517 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.withdrawRequestView',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      554 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.viewTrx',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      575 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.topupRequestView',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::1cd5Ch9UKzuR0wT6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::1cd5Ch9UKzuR0wT6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9VOPhlCXgJkHEbCR' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000359f725400000000000ff379";}";s:4:"hash";s:44:"N56z4qcZWTMwf4QmSixQEutjt3FYZvEeyFVdbx1caKE=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::9VOPhlCXgJkHEbCR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SSjfSTp6dbJYAj4X' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/patient/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PatientController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\PatientController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::SSjfSTp6dbJYAj4X',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::D1LZJ5Q632hDGKeA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/patient/save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PatientController@savePatient',
        'controller' => 'App\\Http\\Controllers\\Api\\PatientController@savePatient',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::D1LZJ5Q632hDGKeA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LsPHzxrz1PZXccHl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gettotalscansfrommobile/{mobile}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PatientController@gettotalscansfrommobile',
        'controller' => 'App\\Http\\Controllers\\Api\\PatientController@gettotalscansfrommobile',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::LsPHzxrz1PZXccHl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZM7HBTwHRt4LxFVe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/gethealthframefromscanidandCID/{scan_id}/{mobile}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PatientController@gethealthframefromscanidandCID',
        'controller' => 'App\\Http\\Controllers\\Api\\PatientController@gethealthframefromscanidandCID',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ZM7HBTwHRt4LxFVe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Tc1ayxF5ZlFOyBQh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/company/getall',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\CompanyController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\CompanyController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/company',
        'where' => 
        array (
        ),
        'as' => 'generated::Tc1ayxF5ZlFOyBQh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yXQkQP9hv6gSzSg6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/company/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\CompanyController@create',
        'controller' => 'App\\Http\\Controllers\\Api\\CompanyController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/company',
        'where' => 
        array (
        ),
        'as' => 'generated::yXQkQP9hv6gSzSg6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WkN4r5gPMFrQ53sy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/company/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\CompanyController@edit',
        'controller' => 'App\\Http\\Controllers\\Api\\CompanyController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/company',
        'where' => 
        array (
        ),
        'as' => 'generated::WkN4r5gPMFrQ53sy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gzAySyeymjkHtu0z' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/company/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\CompanyController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\CompanyController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/company',
        'where' => 
        array (
        ),
        'as' => 'generated::gzAySyeymjkHtu0z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vL4dfSK6wzwd7c2O' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/company/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\CompanyController@deleteData',
        'controller' => 'App\\Http\\Controllers\\Api\\CompanyController@deleteData',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/company',
        'where' => 
        array (
        ),
        'as' => 'generated::vL4dfSK6wzwd7c2O',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SAT0GwsEfsj7xC47' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/company/getbyCIN/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\CompanyController@getbyCIN',
        'controller' => 'App\\Http\\Controllers\\Api\\CompanyController@getbyCIN',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/company',
        'where' => 
        array (
        ),
        'as' => 'generated::SAT0GwsEfsj7xC47',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4PZDic7Ksizq6QGX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/importp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PatientController@importPatient',
        'controller' => 'App\\Http\\Controllers\\Api\\PatientController@importPatient',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::4PZDic7Ksizq6QGX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ckvPCJdmCbyz4x8P' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\AuthController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ckvPCJdmCbyz4x8P',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0UOPHSxlFnvSEFuO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/patient/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Patient\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Api\\Patient\\AuthController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::0UOPHSxlFnvSEFuO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WRgEWtGYBYPraqbw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/patient/forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Patient\\AuthController@forgot_password',
        'controller' => 'App\\Http\\Controllers\\Api\\Patient\\AuthController@forgot_password',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::WRgEWtGYBYPraqbw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::on16QDxB4Gi4QS4F' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/patient/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Patient\\AuthController@reset',
        'controller' => 'App\\Http\\Controllers\\Api\\Patient\\AuthController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::on16QDxB4Gi4QS4F',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::F9eJrTdDQMWmEsqK' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/patient/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Patient\\AuthController@register',
        'controller' => 'App\\Http\\Controllers\\Api\\Patient\\AuthController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::F9eJrTdDQMWmEsqK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LhhmRIvz3qs1ViKV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\AuthController@register',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\AuthController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::LhhmRIvz3qs1ViKV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zji5dop5yFfB9a8q' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Patient\\AuthController@contact',
        'controller' => 'App\\Http\\Controllers\\Api\\Patient\\AuthController@contact',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zji5dop5yFfB9a8q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jt3wKJXQCT3eJyNv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth.jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\AuthController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::jt3wKJXQCT3eJyNv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WNATtqjvjqiYdHt4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/patient/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth.jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Patient\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\Api\\Patient\\AuthController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::WNATtqjvjqiYdHt4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::i0gwvRDkXDTm0YbS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/patient/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth.jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Patient\\AuthController@getAuthUser',
        'controller' => 'App\\Http\\Controllers\\Api\\Patient\\AuthController@getAuthUser',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::i0gwvRDkXDTm0YbS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5ItQPY6xhUdC6W0R' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/patient/profile/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth.jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Patient\\HomeController@profileUpdate',
        'controller' => 'App\\Http\\Controllers\\Api\\Patient\\HomeController@profileUpdate',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::5ItQPY6xhUdC6W0R',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8EyiXcMqW7LCzxrt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/patient/changepass',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth.jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Patient\\HomeController@changepass',
        'controller' => 'App\\Http\\Controllers\\Api\\Patient\\HomeController@changepass',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::8EyiXcMqW7LCzxrt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7e36DQZc0x7oQo13' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/patient/appointments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth.jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Patient\\HomeController@appointments',
        'controller' => 'App\\Http\\Controllers\\Api\\Patient\\HomeController@appointments',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::7e36DQZc0x7oQo13',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lBAXudo7uYbEKb3G' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\UserController@profile',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\UserController@profile',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::lBAXudo7uYbEKb3G',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HyEquqPeLBR4TiEC' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/profile/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\UserController@profileUpdate',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\UserController@profileUpdate',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::HyEquqPeLBR4TiEC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::M2FlW1hs3zUHS8nv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/education/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\UserController@educationAdd',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\UserController@educationAdd',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::M2FlW1hs3zUHS8nv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qHHb8R5GvHt3q4Uz' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/education/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\UserController@educationUpdate',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\UserController@educationUpdate',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::qHHb8R5GvHt3q4Uz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LWVyHOxJDLkU6KUj' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/education/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'UserContrexperienceoller@educationDelete',
        'controller' => 'UserContrexperienceoller@educationDelete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::LWVyHOxJDLkU6KUj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6i92T0uVZga8ppAt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/experience/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\UserController@experienceAdd',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\UserController@experienceAdd',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::6i92T0uVZga8ppAt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sxnPAoNU9DYdShKt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/experience/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\UserController@experienceUpdate',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\UserController@experienceUpdate',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::sxnPAoNU9DYdShKt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mrFuvYOmWWx3ovnY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/experience/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\UserController@experienceDelete',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\UserController@experienceDelete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::mrFuvYOmWWx3ovnY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HGgL849VawJEmRvI' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/prescriptions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::HGgL849VawJEmRvI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XnbFE3zH5taLfokk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/prescription/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@view',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@view',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::XnbFE3zH5taLfokk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UgIrIciOK2rSqbUk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/prescription/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@create',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::UgIrIciOK2rSqbUk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dlx8AZ5DIdN4OWmT' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/diagonosis',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@diagonosis',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@diagonosis',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::dlx8AZ5DIdN4OWmT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7gELCUA89cabvkYr' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/additional_advises',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@additionalAdvises',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@additionalAdvises',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::7gELCUA89cabvkYr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OlKU7B6xmEnl2UsP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/advises',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@advises',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@advises',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::OlKU7B6xmEnl2UsP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fuEz2N6NW24A00xV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/advise_investigations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@adviseInvestigations',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@adviseInvestigations',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::fuEz2N6NW24A00xV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::InjqkLD76gUZwtBM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/drugs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@drugs',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@drugs',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::InjqkLD76gUZwtBM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FXAi4BNB1vqSUEYe' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/drug/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@addDrug',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@addDrug',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::FXAi4BNB1vqSUEYe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::luD0iANwoLEYnjXl' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/patientses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@patientses',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\PrescriptionController@patientses',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::luD0iANwoLEYnjXl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SGBrxPdYr5Gzdbz6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\DashboardController@dashboard',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\DashboardController@dashboard',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::SGBrxPdYr5Gzdbz6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JGsxCzpc8Bgg6h92' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/appointments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\DoctorController@appointments',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\DoctorController@appointments',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::JGsxCzpc8Bgg6h92',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zl2IkGY8jVodBhxU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/appointment/list/by_date',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\DoctorController@appointmentListByDate',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\DoctorController@appointmentListByDate',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::zl2IkGY8jVodBhxU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dgKAo2Nch322COBy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/appointment/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\DoctorController@appointmentView',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\DoctorController@appointmentView',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::dgKAo2Nch322COBy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5ZrJkmRiQIoCmz0O' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/appointment/schedule',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\DoctorController@schedule',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\DoctorController@schedule',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::5ZrJkmRiQIoCmz0O',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oWoJ6uR07EeAx8M9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/appointment/schedule/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\DoctorController@addSchedule',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\DoctorController@addSchedule',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::oWoJ6uR07EeAx8M9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eqJsMp0Sma5tCkCF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/live_consults',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\DoctorController@liveConsults',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\DoctorController@liveConsults',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::eqJsMp0Sma5tCkCF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tn5SyXeWdnDeARUb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/doctor/live_consult/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Doctor\\DoctorController@liveConsultEdit',
        'controller' => 'App\\Http\\Controllers\\Api\\Doctor\\DoctorController@liveConsultEdit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/doctor',
        'where' => 
        array (
        ),
        'as' => 'generated::tn5SyXeWdnDeARUb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0eKKLHk0DPabRsAV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/vle/getall',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\VleController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\VleController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/vle',
        'where' => 
        array (
        ),
        'as' => 'generated::0eKKLHk0DPabRsAV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KJok0FTPDz9v23Vt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/vle/chambers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\VleController@chambers',
        'controller' => 'App\\Http\\Controllers\\Api\\VleController@chambers',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/vle',
        'where' => 
        array (
        ),
        'as' => 'generated::KJok0FTPDz9v23Vt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZNpXHK0f2nN0eNYU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/vle/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\VleController@create',
        'controller' => 'App\\Http\\Controllers\\Api\\VleController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/vle',
        'where' => 
        array (
        ),
        'as' => 'generated::ZNpXHK0f2nN0eNYU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hik2GfqoDB9YRjkk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/vle/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\VleController@viewVle',
        'controller' => 'App\\Http\\Controllers\\Api\\VleController@viewVle',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/vle',
        'where' => 
        array (
        ),
        'as' => 'generated::hik2GfqoDB9YRjkk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vWzu09Fx8pTBfa3M' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/vle/session',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\VleController@VleSession',
        'controller' => 'App\\Http\\Controllers\\Api\\VleController@VleSession',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/vle',
        'where' => 
        array (
        ),
        'as' => 'generated::vWzu09Fx8pTBfa3M',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jJxVaspB4EdRadru' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/vle/session/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\VleController@viewVleSession',
        'controller' => 'App\\Http\\Controllers\\Api\\VleController@viewVleSession',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/vle',
        'where' => 
        array (
        ),
        'as' => 'generated::jJxVaspB4EdRadru',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::v8OyoHnTFK3kewgw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/wallet/getall',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::v8OyoHnTFK3kewgw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zFa4Ov6nRwF7FCeO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/wallet/transactions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@transactions',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@transactions',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::zFa4Ov6nRwF7FCeO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TvoFZCdzFLww3e2v' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/wallet/transactions/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@viewTrx',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@viewTrx',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::TvoFZCdzFLww3e2v',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sKDviEj61880jM0T' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/wallet/request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@withdrawRequest',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@withdrawRequest',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::sKDviEj61880jM0T',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ok39RVFv9UJW0er3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/wallet/request/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@withdrawRequestView',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@withdrawRequestView',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::ok39RVFv9UJW0er3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::v173JmryW2izLEW5' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/wallet/request-approval-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@approvalConfirm',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@approvalConfirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::v173JmryW2izLEW5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lwdTpfZbLtpuBcy3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/wallet/request/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@withdrawRequestApprove',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@withdrawRequestApprove',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::lwdTpfZbLtpuBcy3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Vcewi96q1ng1Ldc9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/wallet/request/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@withdrawRequestReject',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@withdrawRequestReject',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::Vcewi96q1ng1Ldc9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Hxq8K21lqtIblL2Z' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/wallet/request/reason',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@viewRejectReason',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@viewRejectReason',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::Hxq8K21lqtIblL2Z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cmYQaFBpgvEwJuoo' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/wallet/topup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@topupRequest',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@topupRequest',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::cmYQaFBpgvEwJuoo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Ve9QjDoHYggHfk5z' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/wallet/topup/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@topupRequestView',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@topupRequestView',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::Ve9QjDoHYggHfk5z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Lnyo4ACbDvdrv7BA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/wallet/topupRequestReject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@topupRequestReject',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@topupRequestReject',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::Lnyo4ACbDvdrv7BA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4hpx6iHhb79mvK0i' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/wallet/approveTopupRequest',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@approveTopupRequest',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@approveTopupRequest',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::4hpx6iHhb79mvK0i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::H4L6udaNSoqZ8ohs' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/invoice/getall',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\InvoiceController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\InvoiceController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/invoice',
        'where' => 
        array (
        ),
        'as' => 'generated::H4L6udaNSoqZ8ohs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::b8XRhyv2Zpqg2oZA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/invoice/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\InvoiceController@view',
        'controller' => 'App\\Http\\Controllers\\Api\\InvoiceController@view',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/invoice',
        'where' => 
        array (
        ),
        'as' => 'generated::b8XRhyv2Zpqg2oZA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gK0k5dr6xUW2uSd3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/invoice/nict',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\InvoiceController@createNICTInvoice',
        'controller' => 'App\\Http\\Controllers\\Api\\InvoiceController@createNICTInvoice',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/invoice',
        'where' => 
        array (
        ),
        'as' => 'generated::gK0k5dr6xUW2uSd3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1pS6utnuSa5eMhbr' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/nict/invoice/transactions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\InvoiceController@transactions',
        'controller' => 'App\\Http\\Controllers\\Api\\InvoiceController@transactions',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/nict/invoice',
        'where' => 
        array (
        ),
        'as' => 'generated::1pS6utnuSa5eMhbr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::M0lpYQuO0vZpBM9g' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vle/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Vle\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Api\\Vle\\AuthController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vle',
        'where' => 
        array (
        ),
        'as' => 'generated::M0lpYQuO0vZpBM9g',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BhkZaFwbFOWGH5BN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vle/appointment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Vle\\AppointmentController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Vle\\AppointmentController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vle/appointment',
        'where' => 
        array (
        ),
        'as' => 'generated::BhkZaFwbFOWGH5BN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yOBOzAsyMC97QNNj' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vle/appointment/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Vle\\AppointmentController@create',
        'controller' => 'App\\Http\\Controllers\\Api\\Vle\\AppointmentController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vle/appointment',
        'where' => 
        array (
        ),
        'as' => 'generated::yOBOzAsyMC97QNNj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sultJchDK2us83ZK' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vle/invoice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Vle\\InvoiceController@vle_invoice',
        'controller' => 'App\\Http\\Controllers\\Api\\Vle\\InvoiceController@vle_invoice',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vle/invoice',
        'where' => 
        array (
        ),
        'as' => 'generated::sultJchDK2us83ZK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qtXaPGIdhedDiCas' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vle/invoice/details/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Vle\\InvoiceController@details',
        'controller' => 'App\\Http\\Controllers\\Api\\Vle\\InvoiceController@details',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vle/invoice',
        'where' => 
        array (
        ),
        'as' => 'generated::qtXaPGIdhedDiCas',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::q005QUgaFlIbJ2sW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vle/wallet',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Vle\\WalletController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Vle\\WalletController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vle/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::q005QUgaFlIbJ2sW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hUPnGyjkDKVVS0mN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vle/withdraw_request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Vle\\WalletController@withdrawRequest',
        'controller' => 'App\\Http\\Controllers\\Api\\Vle\\WalletController@withdrawRequest',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vle/withdraw_request',
        'where' => 
        array (
        ),
        'as' => 'generated::hUPnGyjkDKVVS0mN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NeM6m2OJ2XjFWrxp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/vle/withdraw_request/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Vle\\WalletController@withdrawRequestAdd',
        'controller' => 'App\\Http\\Controllers\\Api\\Vle\\WalletController@withdrawRequestAdd',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/vle/withdraw_request',
        'where' => 
        array (
        ),
        'as' => 'generated::NeM6m2OJ2XjFWrxp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0Wf7kvpt2XNK4P3h' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/staff/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Staff\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Api\\Staff\\AuthController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/staff',
        'where' => 
        array (
        ),
        'as' => 'generated::0Wf7kvpt2XNK4P3h',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::O0AqCXmiHvcACQId' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/staff/appointment/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Staff\\AppointmentController@create',
        'controller' => 'App\\Http\\Controllers\\Api\\Staff\\AppointmentController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/staff/appointment',
        'where' => 
        array (
        ),
        'as' => 'generated::O0AqCXmiHvcACQId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::baE10zBVS5Sup9ma' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/staff/appointment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Staff\\AppointmentController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Staff\\AppointmentController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/staff/appointment',
        'where' => 
        array (
        ),
        'as' => 'generated::baE10zBVS5Sup9ma',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2zullCGdPS7wUfvZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/staff/patient',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Staff\\PatientController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Staff\\PatientController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/staff/patient',
        'where' => 
        array (
        ),
        'as' => 'generated::2zullCGdPS7wUfvZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sKKDbDvhN4fnldYF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/staff/patient/details/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Staff\\PatientController@details',
        'controller' => 'App\\Http\\Controllers\\Api\\Staff\\PatientController@details',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/staff/patient',
        'where' => 
        array (
        ),
        'as' => 'generated::sKKDbDvhN4fnldYF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::r31oo7XFsCviJGEO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/staff/patient/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Staff\\PatientController@create',
        'controller' => 'App\\Http\\Controllers\\Api\\Staff\\PatientController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/staff/patient',
        'where' => 
        array (
        ),
        'as' => 'generated::r31oo7XFsCviJGEO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6x7i3SnzSTMqmHxt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/staff/patient/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Staff\\PatientController@deleteData',
        'controller' => 'App\\Http\\Controllers\\Api\\Staff\\PatientController@deleteData',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/staff/patient',
        'where' => 
        array (
        ),
        'as' => 'generated::6x7i3SnzSTMqmHxt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LSfiEGWlZGuBebCU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/staff/patient/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Staff\\PatientController@updateData',
        'controller' => 'App\\Http\\Controllers\\Api\\Staff\\PatientController@updateData',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/staff/patient',
        'where' => 
        array (
        ),
        'as' => 'generated::LSfiEGWlZGuBebCU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XICOgbzs4dZDk3Be' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/join_us',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\CompanyController@joinUs',
        'controller' => 'App\\Http\\Controllers\\Api\\CompanyController@joinUs',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::XICOgbzs4dZDk3Be',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::F3I3cu4Kwa23BRdh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/contact_us',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\CompanyController@contactUs',
        'controller' => 'App\\Http\\Controllers\\Api\\CompanyController@contactUs',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::F3I3cu4Kwa23BRdh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Io0shI9ePebVl2gB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function () {
    // return view(\'welcome\');
     return \\view(\'user.login\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000359f72ee00000000000ff379";}";s:4:"hash";s:44:"9KfpE4A7mJpGLA7MUZ3sb1j3ZFz78yPCAgE3OubDUqA=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Io0shI9ePebVl2gB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2Ne8i6s3yL2pDlZK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'route-cache',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:411:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:192:"function() {
    $exitCode = \\Artisan::call(\'optimize\');
    $exitCode = \\Artisan::call(\'route:cache\');
    $exitCode = \\Artisan::call(\'route:clear\');
    
    return \'Routes cache cleared\';
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000359f72f700000000000ff379";}";s:4:"hash";s:44:"bpv9TAk26SWiKXqV1S8tH7T6NnQnGhuUsuvxXLZDEtM=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::2Ne8i6s3yL2pDlZK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fYQBTu6brzdpJbrN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'config-cache',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:364:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:145:"function() {
    $exitCode = \\Artisan::call(\'config:clear\');
    $exitCode = \\Artisan::call(\'config:cache\');
    return \'Config cache cleared\';
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000359f72f500000000000ff379";}";s:4:"hash";s:44:"VYZAv7fSkowgLR1m5TkXrUJh3EAYJ3rU1zVtfs+Q+U8=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::fYQBTu6brzdpJbrN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2u8tS1pdVCZDZOAl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clear-cache',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:320:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:101:"function() {
    $exitCode = \\Artisan::call(\'cache:clear\');
    return \'Application cache cleared\';
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000359f72fb00000000000ff379";}";s:4:"hash";s:44:"FDrB3EaoyFHbKj6plPaSOA5+ysiQJx40y/qT25qHXyY=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::2u8tS1pdVCZDZOAl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cK0B0V1QsxTwKFqI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'view-clear',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:311:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:93:"function() {
    $exitCode = \\Artisan::call(\'view:clear\');
    return \'View cache cleared\';
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000359f72f900000000000ff379";}";s:4:"hash";s:44:"X52L/6JAJkzUXNngO00NAE9+AdvXBjBIeLtUGlBtIkA=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::cK0B0V1QsxTwKFqI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Q8LEZJrMHsnmvQol' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dump-autoload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:324:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:105:"function() {
    "<pre>". \\shell_exec (\'composer dump-autoload\')."</pre>";
    return \'Dump autoload\'; 
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000359f72ff00000000000ff379";}";s:4:"hash";s:44:"kP4/jblr2KTsXlJ8hBY6LrFSzMa814FG8xzsebjkPE4=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Q8LEZJrMHsnmvQol',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Cw5NFslczMzNk8sT' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Cw5NFslczMzNk8sT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Xlhe4giJIHrI60nV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Xlhe4giJIHrI60nV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tBoaj9XuDa2vMJB2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::tBoaj9XuDa2vMJB2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Hwwaofvk5BwqeBwE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:257:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:39:"function(){
    // dd(\\Auth::user());
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000359f72fd00000000000ff379";}";s:4:"hash";s:44:"h83tqrYOA1lCqCngwQNZ2lkTILtqIkG3g9v3+vosxY8=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Hwwaofvk5BwqeBwE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vLebKNmnMRTImPM0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'testemai',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:370:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:151:"function(){
    $vleCreate = \\App\\Models\\VleUser::find(23);
    \\Mail::to(\'ashishbanjare@questglt.com\')->send(new \\App\\Mail\\VleRegister($vleCreate));
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000359f72c400000000000ff379";}";s:4:"hash";s:44:"k1eoJ+3DC7ZOsAmSDjy6msazqt2L1rCOH+xmaR3WP1g=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::vLebKNmnMRTImPM0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zubaivmspKdkWjMb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'speciality',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@index',
        'controller' => 'App\\Http\\Controllers\\ApiController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::zubaivmspKdkWjMb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pyLsjkr3EWpwQnZz' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'appointment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@store',
        'controller' => 'App\\Http\\Controllers\\ApiController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::pyLsjkr3EWpwQnZz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GPqVje8FwDaeqwgS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'signin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\LoginController@index',
        'controller' => 'App\\Http\\Controllers\\User\\LoginController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::GPqVje8FwDaeqwgS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'signin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\User\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-password-forgot' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\LoginController@forgotPassword',
        'controller' => 'App\\Http\\Controllers\\User\\LoginController@forgotPassword',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-password-forgot',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-resetPassword' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\LoginController@resetPassword',
        'controller' => 'App\\Http\\Controllers\\User\\LoginController@resetPassword',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-resetPassword',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\User\\DashboardController@index',
        'as' => 'user.dashboard',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.dashboardVleGraph' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/vle-graph',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\DashboardController@dashboardVleGraph',
        'controller' => 'App\\Http\\Controllers\\User\\DashboardController@dashboardVleGraph',
        'as' => 'user.dashboardVleGraph',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.$monthData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/clinic-graph',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\DashboardController@dashboardClinicGraph',
        'controller' => 'App\\Http\\Controllers\\User\\DashboardController@dashboardClinicGraph',
        'as' => 'user.$monthData',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.password' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\DashboardController@password',
        'controller' => 'App\\Http\\Controllers\\User\\DashboardController@password',
        'as' => 'user.password',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.passwordUpdate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\DashboardController@passwordUpdate',
        'controller' => 'App\\Http\\Controllers\\User\\DashboardController@passwordUpdate',
        'as' => 'user.passwordUpdate',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\DashboardController@logout',
        'controller' => 'App\\Http\\Controllers\\User\\DashboardController@logout',
        'as' => 'user.logout',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.invoices' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'invoice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\InvoiceController@index',
        'controller' => 'App\\Http\\Controllers\\User\\InvoiceController@index',
        'as' => 'user.invoices',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.nict' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'invoice/nict',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\InvoiceController@createNICTInvoice',
        'controller' => 'App\\Http\\Controllers\\User\\InvoiceController@createNICTInvoice',
        'as' => 'user.nict',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.request-amount' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'invoice/request-amount',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\InvoiceController@saveNictInvoiceData',
        'controller' => 'App\\Http\\Controllers\\User\\InvoiceController@saveNictInvoiceData',
        'as' => 'user.request-amount',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.invoiceView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'invoice/view/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\InvoiceController@view',
        'controller' => 'App\\Http\\Controllers\\User\\InvoiceController@view',
        'as' => 'user.invoiceView',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.transactions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'invoice/transactions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\InvoiceController@transactions',
        'controller' => 'App\\Http\\Controllers\\User\\InvoiceController@transactions',
        'as' => 'user.transactions',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/invoice',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.vle' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'vle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\VleController@index',
        'controller' => 'App\\Http\\Controllers\\User\\VleController@index',
        'as' => 'user.vle',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/vle',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.vleAdd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'vle/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\VleController@add',
        'controller' => 'App\\Http\\Controllers\\User\\VleController@add',
        'as' => 'user.vleAdd',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/vle',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.vleCreate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'vle/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\VleController@create',
        'controller' => 'App\\Http\\Controllers\\User\\VleController@create',
        'as' => 'user.vleCreate',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/vle',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.vleView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'vle/view/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\VleController@viewVle',
        'controller' => 'App\\Http\\Controllers\\User\\VleController@viewVle',
        'as' => 'user.vleView',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/vle',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.viewVleSession' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'vle/session/{id}/{date}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\VleController@viewVleSession',
        'controller' => 'App\\Http\\Controllers\\User\\VleController@viewVleSession',
        'as' => 'user.viewVleSession',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/vle',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.VleSession' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'vle/session',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\VleController@VleSession',
        'controller' => 'App\\Http\\Controllers\\User\\VleController@VleSession',
        'as' => 'user.VleSession',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/vle',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.patient' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'patient',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\PatientController@index',
        'controller' => 'App\\Http\\Controllers\\User\\PatientController@index',
        'as' => 'user.patient',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/patient',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.patientView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'patient/view/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\PatientController@viewDetails',
        'controller' => 'App\\Http\\Controllers\\User\\PatientController@viewDetails',
        'as' => 'user.patientView',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/patient',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.wallet' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'wallet',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@index',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@index',
        'as' => 'user.wallet',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.withdrawRequest' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'wallet/request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@withdrawRequest',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@withdrawRequest',
        'as' => 'user.withdrawRequest',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.withdrawRequestView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'wallet/request/view/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@withdrawRequestView',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@withdrawRequestView',
        'as' => 'user.withdrawRequestView',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.approvalConfirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'wallet/request-approval-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@approvalConfirm',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@approvalConfirm',
        'as' => 'user.approvalConfirm',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.withdrawRequestApprove' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'wallet/request/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@withdrawRequestApprove',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@withdrawRequestApprove',
        'as' => 'user.withdrawRequestApprove',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.withdrawRequestReject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'wallet/request/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@withdrawRequestReject',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@withdrawRequestReject',
        'as' => 'user.withdrawRequestReject',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.viewRejectReason' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'wallet/request/reason',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@viewRejectReason',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@viewRejectReason',
        'as' => 'user.viewRejectReason',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.walletTransactions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'wallet/transactions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@transactions',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@transactions',
        'as' => 'user.walletTransactions',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.viewTrx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'wallet/transactions/view/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@viewTrx',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@viewTrx',
        'as' => 'user.viewTrx',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.MytopupRequest' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'wallet/my-topup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@MytopupRequest',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@MytopupRequest',
        'as' => 'user.MytopupRequest',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.applyTopup' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'wallet/applyTopup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@applyTopup',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@applyTopup',
        'as' => 'user.applyTopup',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.MywithdrawRequest' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'wallet/my-withdraw',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@MywithdrawRequest',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@MywithdrawRequest',
        'as' => 'user.MywithdrawRequest',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.applyWithdraw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'wallet/apply-withdraw',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@applyWithdraw',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@applyWithdraw',
        'as' => 'user.applyWithdraw',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.topupRequest' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'wallet/topup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@topupRequest',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@topupRequest',
        'as' => 'user.topupRequest',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.topupRequestView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'wallet/topup/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@topupRequestView',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@topupRequestView',
        'as' => 'user.topupRequestView',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.topupRequestReject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'wallet/topupRequestReject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@topupRequestReject',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@topupRequestReject',
        'as' => 'user.topupRequestReject',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.approveTopupRequest' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'wallet/approveTopupRequest',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'checkLogin',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\WalletController@approveTopupRequest',
        'controller' => 'App\\Http\\Controllers\\User\\WalletController@approveTopupRequest',
        'as' => 'user.approveTopupRequest',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '/wallet',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
