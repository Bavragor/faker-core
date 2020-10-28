<?php declare(strict_types = 1);

namespace Faker\Test\Calculator;

use Faker\Calculator\Iban;
use PHPUnit\Framework\TestCase;

final class IbanTest extends TestCase
{
    public function checksumProvider()
    {
        return [
            [
                'AL47212110090000000235698741',
                '47',
            ],
            [
                'AD1200012030200359100100',
                '12',
            ],
            [
                'AT611904300234573201',
                '61',
            ],
            [
                'AZ21NABZ00000000137010001944',
                '21',
            ],
            [
                'BH67BMAG00001299123456',
                '67',
            ],
            [
                'BE68539007547034',
                '68',
            ],
            [
                'BA391290079401028494',
                '39',
            ],
            [
                'BR7724891749412660603618210F3',
                '77',
            ],
            [
                'BG80BNBG96611020345678',
                '80',
            ],
            [
                'CR0515202001026284066',
                '05',
            ],
            [
                'HR1210010051863000160',
                '12',
            ],
            [
                'CY17002001280000001200527600',
                '17',
            ],
            [
                'CZ6508000000192000145399',
                '65',
            ],
            [
                'DK5000400440116243',
                '50',
            ],
            [
                'DO28BAGR00000001212453611324',
                '28',
            ],
            [
                'EE382200221020145685',
                '38',
            ],
            [
                'FO6264600001631634',
                '62',
            ],
            [
                'FI2112345600000785',
                '21',
            ],
            [
                'FR1420041010050500013M02606',
                '14',
            ],
            [
                'GE29NB0000000101904917',
                '29',
            ],
            [
                'DE89370400440532013000',
                '89',
            ],
            [
                'GI75NWBK000000007099453',
                '75',
            ],
            [
                'GR1601101250000000012300695',
                '16',
            ],
            [
                'GL8964710001000206',
                '89',
            ],
            [
                'GT82TRAJ01020000001210029690',
                '82',
            ],
            [
                'HU42117730161111101800000000',
                '42',
            ],
            [
                'IS140159260076545510730339',
                '14',
            ],
            [
                'IE29AIBK93115212345678',
                '29',
            ],
            [
                'IL620108000000099999999',
                '62',
            ],
            [
                'IT60X0542811101000000123456',
                '60',
            ],
            [
                'KZ86125KZT5004100100',
                '86',
            ],
            [
                'KW81CBKU0000000000001234560101',
                '81',
            ],
            [
                'LV80BANK0000435195001',
                '80',
            ],
            [
                'LB62099900000001001901229114',
                '62',
            ],
            [
                'LI21088100002324013AA',
                '21',
            ],
            [
                'LT121000011101001000',
                '12',
            ],
            [
                'LU280019400644750000',
                '28',
            ],
            [
                'MK07250120000058984',
                '07',
            ],
            [
                'MT84MALT011000012345MTLCAST001S',
                '84',
            ],
            [
                'MR1300020001010000123456753',
                '13',
            ],
            [
                'MU17BOMM0101101030300200000MUR',
                '17',
            ],
            [
                'MD24AG000225100013104168',
                '24',
            ],
            [
                'MC5811222000010123456789030',
                '58',
            ],
            [
                'ME25505000012345678951',
                '25',
            ],
            [
                'NL91ABNA0417164300',
                '91',
            ],
            [
                'NO9386011117947',
                '93',
            ],
            [
                'PK36SCBL0000001123456702',
                '36',
            ],
            [
                'PL61109010140000071219812874',
                '61',
            ],
            [
                'PS92PALS000000000400123456702',
                '92',
            ],
            [
                'PT50000201231234567890154',
                '50',
            ],
            [
                'QA58DOHB00001234567890ABCDEFG',
                '58',
            ],
            [
                'RO49AAAA1B31007593840000',
                '49',
            ],
            [
                'SM86U0322509800000000270100',
                '86',
            ],
            [
                'SA0380000000608010167519',
                '03',
            ],
            [
                'RS35260005601001611379',
                '35',
            ],
            [
                'SK3112000000198742637541',
                '31',
            ],
            [
                'SI56263300012039086',
                '56',
            ],
            [
                'ES9121000418450200051332',
                '91',
            ],
            [
                'SE4550000000058398257466',
                '45',
            ],
            [
                'CH9300762011623852957',
                '93',
            ],
            [
                'TN5910006035183598478831',
                '59',
            ],
            [
                'TR330006100519786457841326',
                '33',
            ],
            [
                'AE070331234567890123456',
                '07',
            ],
            [
                'GB29NWBK60161331926819',
                '29',
            ],
            [
                'VG96VPVG0000012345678901',
                '96',
            ],
            [
                'YY24KIHB12476423125915947930915268',
                '24',
            ],
            [
                'ZZ25VLQT382332233206588011313776421',
                '25',
            ],
        ];
    }

    /**
     * @dataProvider checksumProvider
     */
    public function testChecksum($iban, $checksum)
    {
        $this->assertEquals($checksum, Iban::checksum($iban), $iban);
    }

    public function validatorProvider()
    {
        return [
            [
                'AL47212110090000000235698741',
                true,
            ],
            [
                'AD1200012030200359100100',
                true,
            ],
            [
                'AT611904300234573201',
                true,
            ],
            [
                'AZ21NABZ00000000137010001944',
                true,
            ],
            [
                'BH67BMAG00001299123456',
                true,
            ],
            [
                'BE68539007547034',
                true,
            ],
            [
                'BA391290079401028494',
                true,
            ],
            [
                'BR7724891749412660603618210F3',
                true,
            ],
            [
                'BG80BNBG96611020345678',
                true,
            ],
            [
                'CR0515202001026284066',
                true,
            ],
            [
                'HR1210010051863000160',
                true,
            ],
            [
                'CY17002001280000001200527600',
                true,
            ],
            [
                'CZ6508000000192000145399',
                true,
            ],
            [
                'DK5000400440116243',
                true,
            ],
            [
                'DO28BAGR00000001212453611324',
                true,
            ],
            [
                'EE382200221020145685',
                true,
            ],
            [
                'FO6264600001631634',
                true,
            ],
            [
                'FI2112345600000785',
                true,
            ],
            [
                'FR1420041010050500013M02606',
                true,
            ],
            [
                'GE29NB0000000101904917',
                true,
            ],
            [
                'DE89370400440532013000',
                true,
            ],
            [
                'GI75NWBK000000007099453',
                true,
            ],
            [
                'GR1601101250000000012300695',
                true,
            ],
            [
                'GL8964710001000206',
                true,
            ],
            [
                'GT82TRAJ01020000001210029690',
                true,
            ],
            [
                'HU42117730161111101800000000',
                true,
            ],
            [
                'IS140159260076545510730339',
                true,
            ],
            [
                'IE29AIBK93115212345678',
                true,
            ],
            [
                'IL620108000000099999999',
                true,
            ],
            [
                'IT60X0542811101000000123456',
                true,
            ],
            [
                'KZ86125KZT5004100100',
                true,
            ],
            [
                'KW81CBKU0000000000001234560101',
                true,
            ],
            [
                'LV80BANK0000435195001',
                true,
            ],
            [
                'LB62099900000001001901229114',
                true,
            ],
            [
                'LI21088100002324013AA',
                true,
            ],
            [
                'LT121000011101001000',
                true,
            ],
            [
                'LU280019400644750000',
                true,
            ],
            [
                'MK07250120000058984',
                true,
            ],
            [
                'MT84MALT011000012345MTLCAST001S',
                true,
            ],
            [
                'MR1300020001010000123456753',
                true,
            ],
            [
                'MU17BOMM0101101030300200000MUR',
                true,
            ],
            [
                'MD24AG000225100013104168',
                true,
            ],
            [
                'MC5811222000010123456789030',
                true,
            ],
            [
                'ME25505000012345678951',
                true,
            ],
            [
                'NL91ABNA0417164300',
                true,
            ],
            [
                'NO9386011117947',
                true,
            ],
            [
                'PK36SCBL0000001123456702',
                true,
            ],
            [
                'PL61109010140000071219812874',
                true,
            ],
            [
                'PS92PALS000000000400123456702',
                true,
            ],
            [
                'PT50000201231234567890154',
                true,
            ],
            [
                'QA58DOHB00001234567890ABCDEFG',
                true,
            ],
            [
                'RO49AAAA1B31007593840000',
                true,
            ],
            [
                'SM86U0322509800000000270100',
                true,
            ],
            [
                'SA0380000000608010167519',
                true,
            ],
            [
                'RS35260005601001611379',
                true,
            ],
            [
                'SK3112000000198742637541',
                true,
            ],
            [
                'SI56263300012039086',
                true,
            ],
            [
                'ES9121000418450200051332',
                true,
            ],
            [
                'SE4550000000058398257466',
                true,
            ],
            [
                'CH9300762011623852957',
                true,
            ],
            [
                'TN5910006035183598478831',
                true,
            ],
            [
                'TR330006100519786457841326',
                true,
            ],
            [
                'AE070331234567890123456',
                true,
            ],
            [
                'GB29NWBK60161331926819',
                true,
            ],
            [
                'VG96VPVG0000012345678901',
                true,
            ],
            [
                'YY24KIHB12476423125915947930915268',
                true,
            ],
            [
                'ZZ25VLQT382332233206588011313776421',
                true,
            ],


            [
                'AL4721211009000000023569874',
                false,
            ],
            [
                'AD120001203020035910010',
                false,
            ],
            [
                'AT61190430023457320',
                false,
            ],
            [
                'AZ21NABZ0000000013701000194',
                false,
            ],
            [
                'BH67BMAG0000129912345',
                false,
            ],
            [
                'BE6853900754703',
                false,
            ],
            [
                'BA39129007940102849',
                false,
            ],
            [
                'BR7724891749412660603618210F',
                false,
            ],
            [
                'BG80BNBG9661102034567',
                false,
            ],
            [
                'CR051520200102628406',
                false,
            ],
            [
                'HR121001005186300016',
                false,
            ],
            [
                'CY1700200128000000120052760',
                false,
            ],
            [
                'CZ650800000019200014539',
                false,
            ],
            [
                'DK500040044011624',
                false,
            ],
            [
                'DO28BAGR0000000121245361132',
                false,
            ],
            [
                'EE38220022102014568',
                false,
            ],
            [
                'FO626460000163163',
                false,
            ],
            [
                'FI2112345600000780',
                false,
            ],
            [
                'FR1420041010050500013M0260',
                false,
            ],
            [
                'GE29NB000000010190491',
                false,
            ],
            [
                'DE8937040044053201300',
                false,
            ],
            [
                'GI75NWBK00000000709945',
                false,
            ],
            [
                'GR160110125000000001230069',
                false,
            ],
            [
                'GL896471000100020',
                false,
            ],
            [
                'GT82TRAJ0102000000121002969',
                false,
            ],
            [
                'HU4211773016111110180000000',
                false,
            ],
            [
                'IS14015926007654551073033',
                false,
            ],
            [
                'IE29AIBK9311521234567',
                false,
            ],
            [
                'IL62010800000009999999',
                false,
            ],
            [
                'IT60X054281110100000012345',
                false,
            ],
            [
                'KZ86125KZT500410010',
                false,
            ],
            [
                'KW81CBKU000000000000123456010',
                false,
            ],
            [
                'LV80BANK000043519500',
                false,
            ],
            [
                'LB6209990000000100190122911',
                false,
            ],
            [
                'LI21088100002324013A',
                false,
            ],
            [
                'LT12100001110100100',
                false,
            ],
            [
                'LU28001940064475000',
                false,
            ],
            [
                'MK0725012000005898',
                false,
            ],
            [
                'MT84MALT011000012345MTLCAST001',
                false,
            ],
            [
                'MR130002000101000012345675',
                false,
            ],
            [
                'MU17BOMM0101101030300200000MU',
                false,
            ],
            [
                'MD24AG00022510001310416',
                false,
            ],
            [
                'MC58112220000101234567890',
                false,
            ],
            [
                'ME2550500001234567895',
                false,
            ],
            [
                'NL91ABNA041716430',
                false,
            ],
            [
                'NO938601111794',
                false,
            ],
            [
                'PK36SCBL000000112345670',
                false,
            ],
            [
                'PL6110901014000007121981287',
                false,
            ],
            [
                'PS92PALS00000000040012345670',
                false,
            ],
            [
                'PT5000020123123456789015',
                false,
            ],
            [
                'QA58DOHB00001234567890ABCDEF',
                false,
            ],
            [
                'RO49AAAA1B3100759384000',
                false,
            ],
            [
                'SM86U032250980000000027010',
                false,
            ],
            [
                'SA038000000060801016751',
                false,
            ],
            [
                'RS3526000560100161137',
                false,
            ],
            [
                'SK311200000019874263754',
                false,
            ],
            [
                'SI5626330001203908',
                false,
            ],
            [
                'ES912100041845020005133',
                false,
            ],
            [
                'SE455000000005839825746',
                false,
            ],
            [
                'CH930076201162385295',
                false,
            ],
            [
                'TN591000603518359847883',
                false,
            ],
            [
                'TR33000610051978645784132',
                false,
            ],
            [
                'AE07033123456789012345',
                false,
            ],
            [
                'GB29NWBK6016133192681',
                false,
            ],
            [
                'VG96VPVG000001234567890',
                false,
            ],
            [
                'YY24KIHB1247642312591594793091526',
                false,
            ],
            [
                'ZZ25VLQT38233223320658801131377642',
                false,
            ],
        ];
    }

    /**
     * @dataProvider validatorProvider
     */
    public function testIsValid($iban, $isValid)
    {
        $this->assertEquals($isValid, Iban::isValid($iban), $iban);
    }

    public function alphaToNumberProvider()
    {
        return [
            [
                'A',
                10,
            ],
            [
                'B',
                11,
            ],
            [
                'C',
                12,
            ],
            [
                'D',
                13,
            ],
            [
                'E',
                14,
            ],
            [
                'F',
                15,
            ],
            [
                'G',
                16,
            ],
            [
                'H',
                17,
            ],
            [
                'I',
                18,
            ],
            [
                'J',
                19,
            ],
            [
                'K',
                20,
            ],
            [
                'L',
                21,
            ],
            [
                'M',
                22,
            ],
            [
                'N',
                23,
            ],
            [
                'O',
                24,
            ],
            [
                'P',
                25,
            ],
            [
                'Q',
                26,
            ],
            [
                'R',
                27,
            ],
            [
                'S',
                28,
            ],
            [
                'T',
                29,
            ],
            [
                'U',
                30,
            ],
            [
                'V',
                31,
            ],
            [
                'W',
                32,
            ],
            [
                'X',
                33,
            ],
            [
                'Y',
                34,
            ],
            [
                'Z',
                35,
            ],
        ];
    }

    /**
     * @dataProvider alphaToNumberProvider
     */
    public function testAlphaToNumber($letter, $number)
    {
        $this->assertEquals($number, Iban::alphaToNumber($letter), $letter);
    }

    public function mod97Provider()
    {
        // Large numbers
        $return = [
            [
                '123456789123456789',
                7,
            ],
            [
                '111222333444555666',
                73,
            ],
            [
                '4242424242424242424242',
                19,
            ],
            [
                '271828182845904523536028',
                68,
            ],
        ];

        // 0-200
        for ($i = 0; $i < 200; $i++) {
            $return[] = [
                (string) $i,
                $i % 97,
            ];
        }

        return $return;
    }

    /**
     * @dataProvider mod97Provider
     */
    public function testMod97($number, $result)
    {
        $this->assertEquals($result, Iban::mod97($number), $number);
    }
}
