-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 12:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kss3`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `Academic_id` int(100) NOT NULL,
  `Academic_name` varchar(255) NOT NULL,
  `Expertid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`Academic_id`, `Academic_name`, `Expertid`) VALUES
(1, 'IJAZAH SARJANA (MASTERS DEGREE), Centre of Advanced Software Engineering - UTM', 66),
(2, 'adasaAAAS', 66);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `post_id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`post_id`, `username`, `comment`) VALUES
(1, 'max', 'What are the resources or websites I can refer to in order to get more info on cryptojacking ?'),
(2, 'marissa', 'Thanks for the help. Can I also know how to apply CRUD (create, retrieve, update and delete) the user inputted data into the database ?'),
(3, 'alex', 'What is the use of session and why it session needed in any website or system?');

-- --------------------------------------------------------

--
-- Table structure for table `complaintlist`
--

CREATE TABLE `complaintlist` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `type_complaint` varchar(50) NOT NULL,
  `complaint` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(8) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaintlist`
--

INSERT INTO `complaintlist` (`id`, `username`, `type_complaint`, `complaint`, `date`, `time`, `status`) VALUES
(41, 'Ahmad', 'Answer Not Specific', 'BBBBBBB', '22-06-2023', '10:11:54', 'In Investigation'),
(43, 'ABU', 'Answer Not Specific', 'AAAAA', '22-06-2023', '11:40:00', 'In Investigation'),
(44, 'hidayah', 'Answer Not Specific', 'BBBBBBB', '01-07-2023', '14:18:55', 'Resolved'),
(45, 'Syahirah', 'Answer Not Specific', 'Feedback from expert does not related to the question', '01-07-2023', '14:40:47', 'On Hold'),
(46, 'Amalia', 'Wrongly Assigned Research Area', 'Wrong topic', '01-07-2023', '14:41:13', 'On Hold'),
(47, 'Samad', 'Answer Not Specific', 'zzzzzzzz', '01-07-2023', '16:43:29', 'In Investigation');

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `CV_id` int(100) NOT NULL,
  `CV_image` blob NOT NULL,
  `expertid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`CV_id`, `CV_image`, `expertid`) VALUES
(1, 0xffd8ffe000104a46494600010100000100010000ffdb0084000a0607151313161414141716161719171c1819181919191c1d18191a181f1a211d191c202d24191d271d1819233423272b313131311d22363b36303a2d30312e010b0b0b0f0e0f1911111c30272120303a30303032303030303230303b3030302e2e30303030303030303037303030302e30303030302e302e2e30303030302e30ffc0001108010b00bd03012200021101031101ffc4001b00000105010100000000000000000000000001020304060507ffc40042100001020403040607060504020300000001021100032131041241052251611332718191a1142333425272b21562b1c1d1f0062492e1f11643536334820783c2ffc400190101000301010000000000000000000000000103040502ffc400221101000105000203000300000000000000000102030411311221415161132232ffda000c03010002110311003f00d1410409492585498e6b488219b73192b072c2a73ad6a2c89492c4f173c06a7f18cce2ff008ea626a9c34929170f3547bd62c7ba2dfe2abe7d222adf1a9822b7f0ced9c363d1ea8f47380754a2733559c1f7873e768b53659492141888f355baa9e9154492371b23d8caf911f488c3c6e3647b195f223e9116e3f65e2e717208208d4a84104100904523875e6242d9c9a5c3316a1a5dacd47868c3cd707a4e0e296055caec45583b479dcfd274bf0450122751e60a3e9ab29b4e6205499cc5a607228e053aadeed7deed71410dfe1a5f8228af0cb395a610d9cdcd495029e4c052af7a424dc34c553a4a6960fba45587c441fd21b9fa34bf0b1530d296927328292c186be3e3e316e2610208208904104101e771d4d8b87a159bd8766b1cb8ef6cd1ea91d9f998cb8d4c4d5efe175c9d52f2ac6a27ed0da93916128a921dc250841602f524d7b4c6815ffc5e95079b3d44f04801bbcc75f13b08a3133e6ca5f46a9e84316059482735f8ba6249d84c40c3a64ccc4acaca8033521293504d1830ab47bafd553b5d6e374c6981dafb346cdc44a9b2545d241a972aca7783eae92a1df1e998d6988cc2e9af76bfac623f887611489499930ce505b9528d72e553f981411a5d8d89cc8af08f7447951312a6f7f5aa26091bad91ec657c88fa44616375b23d8caf911f488a71fb28b9c53c4e25416409c9152c9e8c96028452e28efc5f934271e583e2123ffac9d058b583bf78b089f138901453d291bdff001951e42ae1835db86b531ab145834e5b97caf28b1d45027fcf2bc6a54967630a42019a01cb994ac8588366f8683cc7184978c2a2122725d56dc2eec5b91059fba970c8a9ca505ac4f212977795502acda9f0d38c2cb9ab25c4d3bb954b065b0ca0d59c3b900c0187c612b48e952a049046520922942cc5957fee21518b6caa54e49492bb219f2b8201ad8fe1c22138a2c3d7aaba995e059ae4f8bda2591354a0b509e484804bcb0e050b81ab80a1dfc44024ac492a4a533c28927dcb80092c6dc6b6a086a7698ca5e7a09206521074eb535151d9cd89845631ceecf50054c0744f7a80296d2b5a43e4621c8027294a24ff00b6c2a14da3382c6feef3300d4e3144a5a7258b01eacd5f57d4d0dbfc4b3318c32f4a0282885128268e68c1803fa440a9ea41ca710680827a3f7ac3466706e7585563283d7aacb7f5576af0a302036bdb6072768a4248e98153a6a51ceb402c6bd85e0998e2419889c9c8ec3d5925d816bd4b39ef6e70e9ab525490a9cb62973eac1069cc1cb6259b5ec88f0f886cbeb9594d8744475a89b8a241eee3013e2314cacbd280a481986573a1af0749d3f2688138d34f5e9228ed2cf3a3fbaedaf3312ce594139e72ecd497473ab817a83dd109c63103a75706e849249b69a0ff003017b09890b52b2af300dbb94821ed53cc2bcbbeec73767add6adf2aa547479385cea780d23a501e751d8d8b3dd39354dbb0ff0078e3c3a54c292082c4460b573c2adafae9f28d3abb752be8c2e58cca410acbaa85940736b73023318bc589d967099ba0be6a012f29345a4a81cda55263b581c4ad7366198b484f4644bd00538357e39455fc223c66c5c34ff5865a0296c55401cfde1a91ce34dc9a6b9dc4bdd899a626258e998e56217d2d7a31ba8269989ba9b850b77c697660ca8ed8a9b576385cbc92d4107a5417ad12842ea1aeea5b3728bd225e5484b92c2e59cf3a444dc8a68d4755d747957bf83e373b23d8caf911f488c346e7647b195f223e911e31fb28b9c579cb567500a9a5c960134146a17147ad79686b1ae6aa8ea9d7a3200a716d6f6f289bd1f315ef4e46f3b822b5ae50c6941a5a8358ae26904129c4d0a4b3020d6dc481db5e778d4a92216a2859cf319d2dbacb00b3eb5bde96d6e498086799377b7a89e61830b70fc6f1114aa897c4bbd4b2790bd5ab57aeb134e4941527d728292ce19555021c38a1197c556808fd24e52e6681baacc5166a1b9a3b036a3bdad24c5101242e69cc4281097a14a98116ff00035ac12641292734f197dd2466200340c35ed7a088a5cc20174e25887b024105cb55eac05addb002672887cf39cd7a82c1c9a773f80d58a89dd5754f07798e5671bb716360dad4c3549268462683ace9bd6bc1d8fe14789d21928583394ea76a1361d6fbbbbe700dc41521c15cd51a7553d96341cafaf1872d4a4253997315bd9b7521f281d550ab8e2de5116651ab6247f4f0e1dbdd12224129cd9b101bdd252e6a4dbcbb071ac0304e3bc734e605ceee9c076da96bd2861f855296e9e9263ba8b9465a6e5383f954d030627a1939c74fbcaaa52ce1c92686c3f2684c3ba8e5fe612e00756560c49a16352cdd846b00e964e5cd9a6dd98a43bdeda8d3f0ac42b9a6f9e755db70134a9cadfbe14061c5241291e91552539a8c1890e0f0ab92d5610b3e5e5591fcc1a5d2c435c33f073fb6809f67ce2490eb34077d2c2f463faf28e8473b67ab78a7d6be504f48cd7a5ac6be5db1d180f3a822bed4133a29bd1fb4e8d7d1dbaf94e5bd3acd78e34d18eceec85304e500b2330978804919813997d09ca68330174950e7c53b69db430470cccc5851584e6490d9141093444e2086984025424867f789a6904f9db4148527a34a49973402929cd9fd6845736e92d248d2aa76f75e3fa8db47047271be902792804c80946e82804ada6f1f75fa3cd63d562c140d5463b18f93a34672898a0e28321564cca059d6552c351b2acf63c4db411b9d91ec657c88fa4479e6cc5cc32c19c0256eaa06b39caec48766b795a3d0f647b195f223e911758ff52f173849b81cc49e926072ec14ccdc380fde81917b2d25f7e607e0b36a53b2917a08d4a94becf15df9950075cd18bd387e907a007ebccb83d73a3d1eedbc69d9176080a09d983fe49a6af559bc38ece06eb99707ac747614d2af17220c621452c82c5c6a451c3db93c2441f65a5dc2e60d582c80fd916e5a1800e4b06737ef8a625ce049cc96a0009341bdf76f54f6b1b4065cea6f2452bdbcb76834d6863ceff13a5f82281973ac169034d4da971c5df935b5be22627682c104112082082008208203ce662d813c013e1157ed247def0af30c2ae0ee9e748b70d989a5812d48e7434abfda48e7a9b3d00074278c3978b03350ba59c6b5b1a69435e478186675e52d2d2140a59ea18a8a4f06dd0f7d44366cf580a3d0e6bdaea621a8d620deb689d09063d1cdc9602952ea0198b54a0c365ed34100ef686d674955f90061264e507f52f45b355ea58756854cf5a738b126a0129ca48a8fdf2880b26666485310e1d8b3f946f3647b197f223e9118502375b23d8cbf911f488bec7655dce2c21dcbb33d1b830bf7bf9470f098b9e9524cc9f2169619b7552ec2a43bb176352686d1a08e1c9c4800054d43114f56ca2480689a824872df2d2352a32562f10c13d361d47e2cab0ec53520161ad1f51de1c5621f7a761d268c322ec58bef1dea706bc486702eae9a5908651f57cd927fab86a21a99e83454e41ea81b95dd53d9abba087ef8061c6e243852e425414b7f57394320cb94de85f3bd4d0a79c4e8958b201136538cc08c84a49cebe61544e40cf706fac671097f6c824663494e5c24a8dbeed789fc5cac78015ebd237a9b9d51bc4bf17b834767b5201e518d63bf877de6dc98c2f95f7aba3db8f28169c6665e532427dc2a0b24ba8d08043325aba9f186fa7b10f3d21f311eaf4cc52007e693a57c204e3ded88416a9011a39038eac3b8402a6563680cc9177272addb7a82ac3dd0e5e8f47ac1d1e31c82a92d9432805039f3a5dc1cc0a72e6e0e5ad70b371b958aa7800e735967aa4921f865ca535e35ab1862b6810ef8840b1ea170e0dc68294ed3ca01d87c3e2c292573505208cc0354387f703167d6f5e42e649df123bc12dd8cde7fda2a2f1cea0d3921c384f464d00af3297abd3b61158e2013d326995fd5d8286614b90500f7f63405c9299d9b7952f2bd8254ecc6c5daeda45d8e39c6b53a71983bee73568dcc07e5ce234ed2707f984695082407637d68fe566721dc822be08a8a5d4a0a725880d4e0471116203cea08208e6b4882068580482161a0c02c6e7647b195f223e911868dcec8f632be447d223463f655dce2c22602481ee963dac0f7d088e57fa9a433bacf56d2e62bac12454248f7d20d684b4766386311b8c173a8d5cae4100eefde273024971f96a54966edd94972a0b0125409caf64256598baa8b1ba1d4e154dd24355fc4b282b2b4c60ceae8d4000402e5c3b5469af22cee90a8101734b026890927bcb396d037e8826a8072a9e59482dd1d407516a5c30637d20165ff00114953b1596cff00edcc0e1040510e9b39efab3c3a66de949be7008046e29eb9a9900cfee9ae56d1de9109c4ba6932750d7701367e0f40de238d5e261a0e92683f28d012d57ab027bb810e0bfea490cf994dca5cc3ab689e34eda686113fc4528a42809843b1696add60825c10edbe9b3c2f48e90334e0f62135639b50e3de03b837186aa62b2d5534d4970822801a6e904877b5c00da120e1fc4521c875d0807d54db90080f96f5f171789d3b410a4a5612a524b10729701412c58ef0a2c69c621c3cc29a9335401174aaafd2684f31a0144c59f4e0e4645bba80dd77ca0bb11d947bbf6b01f692287798eb94f3b8b814bb35a1bf6b4b6775589ea2ec0024da1c71e1944216729146eb02d54b9de151583d3c7c2ba120eeb3333b93a56f6a1368068da12c024380ea7642ae1897003fbc2fac2fda92d9dce9ee97d34ef85f4e1f0aee4757810283505c1a6909f6825d9962d749d5fc2dad3ce02d4a58500a162011a50f2368922292bcc90588700b1b8ede712c079c28f27f0fce21c54913000a49a104754d4722e0df51e6d1622bc8c7ca595844c428a0b2d940e555432b81706fc239d0d2a9f63a29ed68ec4ac1bb8d75626bccea61c9d9290086985c00ea52546852a0e4dea9177bb5999f230884820cc2a528e65289402a53252e424002812280799779952ad993e22d5fd7c844ed0ae9d8a80cdd286b6f8a0dca07b0dc1fb66b181c18939b285ef71503c6dc2f0a30f2eee3c471fdf8f634c952521b30a52a4426653a3927911e1f946ef647b195f223e911868dcec8f632be447d222ec7ecabb9c5b8e25694c402351572a09d48a801b4b831db31c44ca5240744f0c5ca4292d6af52e1b4173cc931a951ca04d1f14352586a18785e95e2f0ab510c5b114705802f9545890455c59b435ad8e8097a4e0cd42b2c58815606c2bcf9c2149208e8e79a92e565e818356c7878b52002ba94ff0032776a286e13e7cb9987a52524179ea0188b17a0a14900fbde46cd0d4c82080d386e825426126cec78904abcbb012e5304ee4ea5866ab3bb1366eff2806f48e2831229f0b5887ffd8b11de609a6acf8aa6a052a2f6ab569dfc0c493a51ba53383b1dd504b124b82353a3977a575861946b4c451d8e7372c3c8035e459dc66074d51cca1ebc556d9438a16e1abb0bb06b423ee82f88dd7cc2e4b005a80d77b46d6ae21dd1153ee4d4922a42daedaf1ab7713c092a952541338872fbc4d801d537079f74024b59247fe4554862406a39ad289e3dd11a410c1b1342ed4d407af69b7104c3ba2601913c01a2574a2750eedf9bf2859b28b756729d8f5ea1b335ec6ee7e5ac03b0d2f329b36212e15d7600d1aed43571d9168601acb99fd5fb66e514b2173bb8821cd7390f9aae0386b000519f4ab4f87c26677339241f7964f78d1aa602fcb4b000925b5373dbce2482080f3a8af230129054512d092b2eb2120662e4d78d54a3de62c411cd6950c6e2254b5cb96a96499a58325c066049f11dce6c0c3926503d5635162682f40ffac5e82276294a12965820387f748edad8dff3e1163d1d3f08f0896121b046e7647b195f223e911868dcec8f632be447d222fc7ecabb9c5c8a1f662080cedc94d46d1adda2babbc5a4cb00923de2e6a7801dd402d19a56c59251ff008d2c8341eb4805441048deb313cc9ee31a953b9f664bfbdfd4742ffbe54b521578096fc2aa345115510f6e65fb4c7206c092a7fe5909342e66135041ab176d7bbb21676c594a01270d2c8485da694e5cfd1e601aa9cd9134b6e880eaa765cbfbc6d751d035385384386cf40e3515abea0ebcc08e1cdd81254acbd02524655374ca0fbcf50096b924ea758546c49346c2cadd510474a6e19233711954685dbbe03afe8287672f52d9b471f87e24bd4bc03032b3103acc5d39cbb365b3d995e7ce398ad912c8093212001d5e994ce998541d95f7d6a762ced08ad8d2828a8e1909770489a412e54f96a1aa6828cfa4075d5b3e5f315f88b6bce18ac1cb20d5c383d6b306be9455c56af1cec1ece44a0ae8a420661569a59545d1cbeb32617a71ecb33656f16969cb50e663162028bd4d733ff48e4405b4ecf4f33c89a778fdb5058001bf66cbb3ab8b9517af325ffc9e26299c1a4b0e852cea7798fee1e7f153b2b0b3914483290a6b13340b392d4b8a980bb2b072e59041622ceaeea0ef1e31690b06c41ec2f1c718760947449604b033886a0166bd00d6e6b52fd0c24b4a40b0535466cd5a0b92e4d05602dc1090b01e7504229f46ef86827eef89fd239ad2433d2f97325e9470f5b52126629090e569038b8e0ff857b2229f804ac92a424b904ef2989019daced47e14b4467664b20a7a343156621cf588b90227d0b23148cd973a737070ff00bac4b1493b2e58292252014b65aaa8d66a5830a45b75701e27f4848746e7647b195f223e911844beaddc7fb46ef647b195f223e9117e3f655dce2e467d59480c890c427df0d5096b1e7467a1f1d047010b0ce93853ba2a68e72bd80b398d4a928c3a5cb26516de3bc6c1db53c3852bc03c69962ad2e4d33573bb92f985eef7efe15914a40259586e5562c5d9db882441298e603d1ceea8ee68458915a0e3cedc41f89940d0a2510000ca5310374b3b9b127ca229d202aa5324a8924b28824303a1de724b82d4a6af06648724e16a5c56e2ce4ea43e82b5b3c0574209c239eb0269e1ad48fd98054c948214a44aa9009130b900e84dd5998f7ddc55c2555928925baaca6a1047543fb8f5ede30d9930125bd1c060a65bdca455d98dc5468dc6812000c70c1205746d28383bd79c0384a492e51268494ef7bcdbbf88f1e55432920d04934ca5d46c69c4d32bd1b807a40404d15e8c921dc1b04900eadc555b57b61bd203ef614019b297762f5ad34358072f0a87502892c4129ad5d94104d6892028539f38109b6e4a01d575eacd6048ead087a7755b9e8e0e18b5010e5a85b787546ef701ca052d0eac8ac380403bda0a354303bc93d8c390008995ae492c039214680368f4aebdd1664c896ceb4cb05c8a2b371677f7aa7bc9e310490330255872e002c59d24d68286cc3b3945f958694ade4a50a0750c45297ee809b0d94240410522942edca268864619087ca90976b06b5a2680f379a436f160e356ab86af6b06d6d15a6992490a35a83556aeff00fe8f713a45a529b426d6e662154e2091d128d6e198debcac239d0d2ae3d1cea3fa95faf37f387e5907870ba85835fb001e11274ce0bca576102b7275e5e708673de4aa96709fd784484419292e1810ff001761a7744a9c620960a0f0e945c552da578690fca380880b1b9d91ec657c88fa4461a373b23d8caf911f488bf1fb2aee717239630732ae651dd01ccb6734e76d62f2017539043eeb062030b972e5dcbd2840d1ce7f67cd9b972ab19d228a43284940b12e58120be601edba93abab52a7464e0e607a494b9d104bf6d7c06913c8c32c10579086344a5afdafa51b9c569582c4eb8a49171ea523570fbd51a518b6af586a3018ad7169268fea13c3419a9573ac074ce1906e84f80fde821dd0a7e14f808e58c0e2b74fa525c29648e8465524801096cce32b12e0d5e11181c56b8a413981f601b2bd4367bb067e669c03a864a59b286e0c397e83c0420c2a3e04ff00488e72705896403884b8273a932825c6eb009248150aaf02cda89a461a704242a682a06aaca2b55e9d8523ba02dfa3a2d952d6b0b41e8e8f8135bd0456561e6d1a681c770373d6d6f3e3477433187ad16aee0a961ce967ef80b224a45923c07ef530df474537534a0a0a08aea9138ffba057440b3733c7f6605c99a452604ab8e571ef5c51e853a8aa785202c7a322bb89ade82ad687a100060001c04541879a59e60d5d922aecde15fddd51879812c66ba9df364167146b71f180bb0456c2cb981f3ac2f83272f1bd7b3ce2cc079ca9f467a5f83d7ca215748f4c8cf47776fdd7cb9c4cb4bd8916b368798d6d102a4b92d3142ba114ad9a39d0d2074b4f66faf5a0026fdcd38f00fe6fe508ac3ffd8a1de214e1ff00ec56a2e2e69012c9ccdbccfc9dbce1f15ba0ff00b55e23f487c896def9576b404d1b9d91ec657c88fa4461a373b23d8caf911f488bf1fb2aee717238b231040acd590ccca96029f7746a92e7bc861a476a28a704430e966519dc824b06bb7697e7d91a952a2b10a70d394455bd5020e9a338ae90271347e956b497aa5037722c3ba85450b579eb7e84892a4924cc2aa58b73ad22c4071578d6bcf58e0f27b5b4af65fce1e7147e35950ce47aa229a06a3d983ddfbc75e16038c3105fdb96a7fb6395e940e09ec7e048133c81bd3661b17e8f2b5146ac1d8b835f85b8c766080e37a590c7a651494a54089692083d957e548138a703d6af3000139031b934b3daa39718ecc101c79d357bbeb941ce92d3ab1b5c0caa177b43518b343d2ad9c16e885ae5f5d0f3af6476a080e6e1f14121454b52faca7ca05134603534279de244ed3965badfd2aa51eb48bd04055c36391309097a07aa48fc445a82080f389acdbccce2fc5c379b4549dd0b92b48177241ad6b6e6f17a2bae4acbb4c21cdb28a0e0ff009c73a1a503c81a0af235e5019b21de8e092ecab8a93e3e716254b582ea5b8e0c00f1ed89e1b1cf69166151665757f47313e1512cb2903f1fc0f26f28b3043612373b23d8caf911f488c346e7647b195f223e9117e3f655dce274cb624b92e5d8b528030a5a8f57b98e1270ea294a3362402129cd998a59654145d02b501cdd20035cc23b89984923290c684b31a02e18daad56b18a12b68cd29738750532cb660402909604b3ef152988046e1d480752a317b1f3babd23109cc1544ac0cb98ad54ddb82ba3bd12916ba2f611664e227875953953919b2b84960c374ddfacae30876acf0dfcaa989ab2ea90e05776b42f426d56ab29db133365f459af9333e9d44a8a4aad99d452da914d5810ff000fef3fa4e27801d20a0705baafee8a9adeb0ec46c1ceef88c407005169164143f56e4124e8e5d9c065c36d498a532b0b35097eb128346d402e08219838b3130e93b4671cb9b0ca4381981505329d881901040bb921de8f006036189599a74e5055f3af31b350b44ebd9ce08e926805eca019f830ff0010a714a723a351ad18fe2ecd463adfb61118c597f54a1d662486a02d6ad59adf9381f67d0833261a835502d7b53ef790e10e4e006ab5aad753d8823cc79c37d2d7ff0012bc43bd6e3c0d1ff55998a5800f44a35340438e07879f8c00367fdf9868455648a86b5a0f40decdd24ceb66cb9b7752ccd673e421abc64c605328970ec494b575a4493310bcae25a8973bae907de6abb683c75b40472f6684949ceb2525ee18f68019bf0d19832cfc066248993126f4552c0588e40b7180e316d494aeb35694625e80b8b78f1a44986c42945952ca3bc11a6a3b602cc2c104079c4d66a960e356ab86af6b06d6d1566224b924805eb522ae747ad49a738b90d291c0473b6d2a425c905f378a94d73c6f530f0894c2b4049eb2ae59eaf5d3b22de41c07841947010d8a6049e23fa8e8383e95ec63c2823a104282806b54d5c377d22d2a524d0a478087641c078436125ac2838a88ddec8f632be447d2230a046eb647b195f223e9117e3f655dce2e411cbc4edf912ca92a9a029272a92ca2a06f601d9aaf6604e8617fd4386ff9e5ebef0f77ade1ac6a54e9c1080c2c0110e2a7a5092a5587e7489a18520dc5ad01557b4501ee583d012fd6b1d7aa6b61c6146d1473f03f76cd7eb8b44be8a8f813a6834b4070c8374a7c072fd078479f69f48ce3e5fc5ab58ddc8a538821ed13cb5b8046a01f186fa3a3e14f80e24fe249ef8900898dfc87410411281041040104104079d410411cd691041040104104011b9d91ec657c88fa4461a373b23d8caf911f488d18fd95773862caf31f52922b574b9a1d347ca9fd888f3cc72f212431018a5cd357b3f0e70c9d869ca5929c565482add12d04b921815289b5a8050f1ac56f45c494d31c9ccc2d2a5b3922bcc5da81e91a953a13f15312ed28a8302188e15045dde941fd9e711359244af8b324a8386b31b17866cd96b438993fa5258874a1040ffd6e22ea540dab014ce2a653d4bbf05a697bfef5e34815889a1bd53bdc674d1f9f2fd7bef410147d266b9f525be74dbb38fede2f41040104104010410401041040104104079d410411cd691041040104104011b9d91ec657c88fa4461a373b23d8caf911f488d18fd95773859db3d0a774dcbdc8aeb51670483c5cc09d9d2c0202007bf883e0e22dc11a952a1d9b2abead35bc4d265848ca90c069db5896080208208020820802082080208208020820802082080f3a8208239ad2208208020820802373b23d8caf911f488c346e7647b195f223e911a31fb2aee717208208d4a84104539db465a5452a5311c41e00d38d0880b90445227a561d25c52bda011e4444b0041041004104100410410041041004104101e75042c11cd692410b0402410b040246e7647b195f223e911878dc6c9f632fe447e023463f655dce2e410411a9508690f7874100410410041041004104100410410041041004104101ffd9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_num` int(11) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `name`, `email`, `phone_num`, `dob`, `gender`) VALUES
(1, 'puva', 'puvaGg@gmail.com', 9090909, '2000-03-01', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(15, 'happy birthday!!', '2022-01-06 00:00:00', '2022-01-07 00:00:00'),
(18, 'Class 1', '2022-01-08 00:00:00', '2022-01-09 00:00:00'),
(19, 'Class 2', '2022-01-09 00:00:00', '2022-01-10 00:00:00'),
(20, 'Lab 1', '2022-01-12 00:00:00', '2022-01-13 00:00:00'),
(21, 'Submission', '2022-01-17 00:00:00', '2022-01-18 00:00:00'),
(22, 'Report Submission', '2022-01-19 00:00:00', '2022-01-20 00:00:00'),
(23, 'Meeting WE', '2022-01-25 00:00:00', '2022-01-26 00:00:00'),
(25, 'z ZC Z ', '2023-06-01 00:00:00', '2023-06-02 00:00:00'),
(27, 'huka', '2023-05-29 00:00:00', '2023-05-30 00:00:00'),
(28, 'zz', '2023-06-28 00:00:00', '2023-06-29 00:00:00'),
(29, 'SHARIFAH', '2023-06-29 00:00:00', '2023-06-30 00:00:00'),
(30, 'sa', '2023-06-27 00:00:00', '2023-06-28 00:00:00'),
(31, 'Puva', '2023-06-30 00:00:00', '2023-07-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`id`, `name`) VALUES
(1, 'Faizal'),
(2, 'Izzati'),
(3, 'Haidar'),
(4, 'Siti'),
(5, 'Barzin'),
(6, 'Awang'),
(7, 'Firash'),
(8, 'Hadees'),
(9, 'Aryan'),
(10, 'Aqil');

-- --------------------------------------------------------

--
-- Table structure for table `expert_prog`
--

CREATE TABLE `expert_prog` (
  `id` int(11) NOT NULL,
  `name_expert` varchar(30) NOT NULL,
  `comment_Expert` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expert_prog`
--

INSERT INTO `expert_prog` (`id`, `name_expert`, `comment_Expert`) VALUES
(1, 'Faizal', 'Your Project is messy'),
(2, 'Izzati', 'You need more improvement'),
(3, 'Haidar', 'Your project is perfect\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_id` int(100) NOT NULL,
  `User_id` int(100) NOT NULL,
  `Postgrp` varchar(100) NOT NULL,
  `Post_desc` varchar(255) NOT NULL,
  `Expert_id` int(100) NOT NULL,
  `Post_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_id`, `User_id`, `Postgrp`, `Post_desc`, `Expert_id`, `Post_answer`) VALUES
(1, 1, 'Computer Network', 'Macam mana nk buat', 66, 'buat macm tu lah'),
(2, 2, 'Science Social', 'apa itu echnometric', 2, 'asdalsdaskdha');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `content` text NOT NULL,
  `category` enum('Research','Course') NOT NULL,
  `status` enum('In progress','Revised','Completed','Accepted') NOT NULL,
  `date` varchar(15) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `category`, `status`, `date`, `likes`) VALUES
(1, 'How to cryptojack ?', 'Cryptojacking is a form of cyber attack where an attacker secretly utilizes someone else\'s computer or device resources, such as CPU and electricity, to mine cryptocurrencies without their consent. The attacker gains profits by exploiting the processing power of the victim\'s device to mine cryptocurrencies like Bitcoin, Monero, or others. Here are the steps typically involved in cryptojacking:\r\n\r\n1. Identify the Target: The attacker selects a target, usually a vulnerable website, web application, or a large number of devices connected to a network.\r\n\r\n2. Inject Malicious Code: The attacker injects malicious code into the target system or website. This can be done through methods like exploiting software vulnerabilities, using malicious email attachments, or employing phishing techniques.\r\n\r\n3. Execute Cryptojacking Script: The injected code contains a cryptojacking script or malware that runs in the background without the victim\'s knowledge. It utilizes the victim\'s device resources to mine cryptocurrencies.\r\n\r\n4. Resource Consumption: The cryptojacking script consumes the victim\'s CPU power, electricity, and network bandwidth to perform the resource-intensive computations required for cryptocurrency mining.\r\n\r\n5. Mining Rewards: The attacker\'s mining pool or wallet receives the mining rewards, which are earned by solving complex mathematical problems and validating cryptocurrency transactions using the victim\'s computing power.\r\n\r\n6. Concealment: To avoid detection, the cryptojacking script may employ various techniques to conceal its presence, such as using obfuscated code, dynamically changing mining algorithms, or periodically adjusting the CPU usage to avoid suspicion.\r\n\r\n7. Continuous Exploitation: Once successful, the attacker can continue exploiting the victim\'s resources for as long as possible, maximizing their illicit mining activities and potential profits.', 'Research', 'In progress', '13-05-2023', 0),
(2, 'How to create a database connection ?', '<?php\r\n$servername = \"localhost\"; // Change to your MySQL server name if necessary\r\n$username = \"root\"; // Change to your MySQL username\r\n$password = \"\"; // Change to your MySQL password\r\n$dbname = \"your_database_name\"; // Change to your database name\r\n\r\n// Create a new MySQLi object\r\n$conn = new mysqli($servername, $username, $password, $dbname);\r\n\r\n// Check the connection\r\nif ($conn->connect_error) {\r\n    die(\"Connection failed: \" . $conn->connect_error);\r\n}\r\n\r\n// Set the character set (optional)\r\n$conn->set_charset(\"utf8\");\r\n\r\n// If the connection is successful, you can perform database operations using $conn object\r\n\r\n// Query the database\r\n$sql = \"SELECT * FROM users\";\r\n$result = $conn->query($sql);\r\n\r\n// Process the query result\r\nif ($result->num_rows > 0) {\r\n    while ($row = $result->fetch_assoc()) {\r\n        echo \"Name: \" . $row[\"name\"] . \"<br>\";\r\n        echo \"Email: \" . $row[\"email\"] . \"<br>\";\r\n        // ... Additional data retrieval or processing\r\n    }\r\n} else {\r\n    echo \"No results found.\";\r\n}\r\n\r\n// Close the database connection\r\n$conn->close();\r\n\r\n?>\r\n', 'Course', 'In progress', '01-06-2023', 2),
(3, 'how to create and destroy a session ?', 'Creating a session example: \r\n<?php\r\nsession_start();\r\n\r\n// Access session variables\r\n$username = $_SESSION[\'username\'];\r\n$email = $_SESSION[\'email\'];\r\n\r\n// Use the session variables as needed\r\necho \"Welcome, $username. Your email is $email.\";\r\n?>\r\n\r\nDestroying a session example: \r\n<?php\r\nsession_start();\r\n\r\n// Unset session variables\r\n$_SESSION = array();\r\n\r\n// Destroy the session\r\nsession_destroy();\r\n?>\r\n', 'Course', 'In progress', '15-06-2023', 3);

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `Publication_id` int(100) NOT NULL,
  `Publication_date` date NOT NULL,
  `Publication_name` varchar(255) NOT NULL,
  `Publication_link` varchar(255) NOT NULL,
  `Expertid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`Publication_id`, `Publication_date`, `Publication_name`, `Publication_link`, `Expertid`) VALUES
(1, '2023-06-24', 'A New Approach of Optimal Search Solution in Particle Swarm Optimization (PSO) Algorithm for Object Detection Method', 'https://doi.org/10.1166/asl.2018.12999 ', 66);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_ID` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_ID`, `rating`) VALUES
(1, 5),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reportexpert`
--

CREATE TABLE `reportexpert` (
  `id` int(20) NOT NULL,
  `ExpertID` varchar(50) NOT NULL,
  `ExpertType` varchar(30) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(8) NOT NULL,
  `RepbyExpert` text NOT NULL,
  `statusExpert` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reportexpert`
--

INSERT INTO `reportexpert` (`id`, `ExpertID`, `ExpertType`, `date`, `time`, `RepbyExpert`, `statusExpert`) VALUES
(1, 'EX20001', 'Expert', '01-06-2023', '07:09:55', 'Cannot give comment ', 'On Hold'),
(2, 'EX20010', 'Expert', '04-06-2023', '09:05:40', 'Cannot write a post', 'In Investigation'),
(3, 'EX20004', 'Expert', '10-06-2023', '23:11:59', 'Cannot give likes', 'Resolved'),
(4, 'EX20006', 'Expert', '15-06-2023', '11:00:45', 'Cannot update profile', 'In Investigation'),
(5, 'EX20005', 'Expert', '18-06-2023', '23:12:29', 'Redundant Post', 'On Hold'),
(6, 'EX20033', 'Expert', '22-06-2023', '04:08:42', 'Have problem', 'On Hold'),
(7, 'EX20002', 'Expert', '01-07-2023', '10:35:23', 'Cannot edit post\r\n', 'On Hold');

-- --------------------------------------------------------

--
-- Table structure for table `reportuser`
--

CREATE TABLE `reportuser` (
  `id` int(20) NOT NULL,
  `userID` varchar(50) NOT NULL,
  `userType` varchar(30) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(8) NOT NULL,
  `post` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reportuser`
--

INSERT INTO `reportuser` (`id`, `userID`, `userType`, `date`, `time`, `post`, `status`) VALUES
(1, 'CA20111', 'Student', '03-06-2023', '23:41:42', 'Cannot give like', 'Resolved'),
(2, 'CA20067', 'Student', '08-06-2023', '21:25:06', 'Redundant comments', 'In Investigation'),
(3, 'CA20082', 'Student', '13-06-2023', '09:47:33', 'Have error', 'In Investigation'),
(4, 'CA20018', 'Student', '16-06-2023', '11:38:06', 'Help', 'On Hold'),
(5, 'CA20088', 'Student', '20-06-2023', '23:07:09', 'Update profile', 'On Hold'),
(6, 'CA20085', 'Student', '01-07-2023', '11:05:26', 'Only can write post once.', 'In Investigation');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `Research_id` int(10) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Role` varchar(30) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Agency` varchar(255) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Expertid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='research table';

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`Research_id`, `Title`, `Role`, `Start_Date`, `End_Date`, `Agency`, `Status`, `Expertid`) VALUES
(1, 'Analysis And Measuring Of Log Server Across The Distributed System	', 'Leader', '2021-01-05', '2023-03-30', 'GERAN DALAM 1	', 'Finised da', 66),
(2, '\"Implementation Of Software Protection System For Internal Intrusion\"', 'member', '2023-06-14', '2023-06-21', 'Geran DALAM', 'Finished', 2),
(3, 'Malware Identification On Mobile Device Using Behavior Monitoring	', 'Member', '2023-06-27', '2023-10-14', 'GERAN DALAM	', 'Finised', 2),
(4, 'Development Of Virtual Reality Training For Fire Safety	', 'member', '2023-06-17', '2023-06-26', 'sdfsd11', 'good', 66),
(5, 'Two Tier Design In Wireless Sensor Network To Select Cluster Head Using Fuzzy Logic For Energy Efficiency	', 'Leader', '2023-06-17', '2023-06-29', 'dah ok ke', 'Data Entry', 2),
(7, 'test11231', 'ytesa', '2023-06-14', '2023-06-13', 'sdfsd', 'Data Entry', 66);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`) VALUES
(1, 'Miss Izzatul'),
(2, 'Sir Hairi'),
(3, 'Miss Sofi'),
(4, 'Mrs. Panjang '),
(5, 'Mr. Qawi '),
(6, 'Dr. Ruwayfi '),
(7, 'Prof. Yusof '),
(8, 'Dr. Umar '),
(9, 'Mr. Raahim '),
(10, 'Sir Putera  '),
(11, 'Sir Perwira  ');

-- --------------------------------------------------------

--
-- Table structure for table `staff_prog`
--

CREATE TABLE `staff_prog` (
  `id` int(11) NOT NULL,
  `name_staff` varchar(30) NOT NULL,
  `comment_Staff` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_prog`
--

INSERT INTO `staff_prog` (`id`, `name_staff`, `comment_Staff`) VALUES
(1, 'Miss Izzatul', 'Please repair your Project'),
(2, 'Sir Hairi', 'You due date is near. If you have any question, Please contact me'),
(3, 'Miss Sofi', 'Good Work!');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`) VALUES
(1, 'Ahmad'),
(2, 'Ali'),
(3, 'Siti'),
(4, 'Bintang'),
(5, 'Bisaam'),
(6, 'Firash'),
(7, 'Fuaad'),
(8, 'Ghazaar'),
(9, 'Hadees '),
(10, 'Hatar '),
(11, 'Hazer '),
(12, 'Johan '),
(13, 'Khajeer  '),
(14, 'Maymuun  '),
(15, 'Mohamed '),
(16, 'Megat '),
(17, 'Fehmeed '),
(18, 'Musawwir '),
(19, 'Nijat ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` int(10) NOT NULL,
  `date` varchar(225) NOT NULL,
  `last_login` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `date`, `last_login`, `status`) VALUES
(6, 'Anas', 'anas@anas', '$2y$10$T3PEs2zob6sUnDymZSfm0O9w/Zx1mi2lw7dG0ojMxZrKQtZU7N/f6', 4, '06-06-2023', NULL, NULL),
(7, 'moh', 'moh@hhss', '$2y$10$P2ZAIUwlVYAxC8s/ckslGulukHBT72Ah6/m9y.FGmIK8x3q22WTlC', 0, '06-08-2023', NULL, NULL),
(8, 'puva', 'puva@puva.com', '$2y$10$ZxOYTzTPvZ6lTgXrG42aJ.GysGINSR.qrE7v.pQm4wMfnaZWl3fQa', 4, '06-08-2023', NULL, NULL),
(62, 'momo', 'mohammedgha037@gmail.com', '$2y$10$VAZSbkfO.Zx8tfWzXxffDOhWhJbuZfPSOsJIQzqEfZHG6xQPco/Ta', 1, '06-18-2023', NULL, NULL),
(64, 'Dummy', 'anasalzumor@gmail.com', '$2y$10$.yoyvJnpOLD3zgVylR6c9eIwQQnRP9hgCL/4bqeZzLDpve9w73yLO', 1, '06-18-2023', NULL, NULL),
(65, 'momo', 'tmcfashion1@gmail.com', '$2y$10$31f0WITa1Igoq..1AJzDXeqv5F3.GehUM2kF6xXRlUL3vbHE3qjle', 3, '06-18-2023', NULL, NULL),
(66, 'Tonystark', 'expert1@gmail.com', '$2y$10$qxQ7z1IT5GbrhHl8VYZizuHMpdOf9chrlmfqR7HywssKlyJzpI/8e', 2, '06-20-2023', '2023-06-22', ''),
(70, 'yoong', 'yoong@hotmail.com', '$2y$10$4m3Q9PAwbYFpXKtzhpTku.IbCAxyprOtc32pgkkqXpf957LtdbB32', 3, '06-21-2023', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userb`
--

CREATE TABLE `userb` (
  `id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(8) NOT NULL,
  `category` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `Posts` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userb`
--

INSERT INTO `userb` (`id`, `date`, `time`, `category`, `title`, `Posts`) VALUES
(1, '2023-06-10', '09:54:00', 'Information', 'Attention', '<p>Who Lost The key!!</p>\r\n'),
(2, '2023-06-10', '09:54:22', 'News', 'New Faculty', '<p>Faculty of Art</p>\r\n'),
(3, '2023-06-01', '09:55:17', 'Important', 'Attention', '<p>This weekend Class 1 must be attended</p>\r\n'),
(4, '2023-06-07', '09:55:41', 'Project Award', 'Congratulation', '<p>Ahmad you win</p>\r\n'),
(5, '22-06-2023', '03:30:23', 'Expert', 'Z  zZ', ' CCXC C'),
(6, '2023-06-22', '03:02:23', 'Expert', 'axaxa', 'axax'),
(7, '2023-06-22', '05:51:54', 'student', 'ssds', 'hahaha'),
(28, '2023-06-22', '06:16:06', 'Expert', 'Development Of Read-One-Write-All Synchronization ', 'dssc'),
(30, '26-06-2023', '17:38:42', 'Project Award', 'Puva', 'hw won'),
(31, '2023-06-26', '17:23:05', 'Expert', 'hula', 'boom'),
(32, '01-07-2023', '19:56:00', 'News', 'ssss', 'Puva');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `course` enum('Diploma in Computer Science','Bachelor of Computer Science (Software Engineering) with Honours','Bachelor of Computer Science (Computer Systems & Networking) with                   Honours','achelor of Computer Science (Graphics & Multimedia Technology) with                   Honours','Bachelor of Computer Science (Cyber Security) with Honours','Master of Science (Information & Communication Technology)','Master of Science (Software Engineering)','Master of Science (Computer Networking)','Research Programmes (PhD & MSc in Computer Science)') NOT NULL,
  `research` varchar(110) NOT NULL,
  `academic_status` enum('Undergraduate','Postgraduate','On hold','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`username`, `email`, `phone`, `course`, `research`, `academic_status`) VALUES
('yoong', 'yoong@gmail.com', '60118472525', '', 'Cryptojacking', 'Undergraduate'),
('ashley', 'ash123@hotmail.com', '60185473956', '', 'Copyright in digital art', 'Undergraduate'),
('mark', 'mark@gmail.com', '60194832985', 'Bachelor of Computer Science (Software Engineering) with Honours', 'AI', 'Undergraduate'),
('mark8', 'mark81@gmail.com', '60194832985', 'Bachelor of Computer Science (Software Engineering) with Honours', 'AI', 'Undergraduate');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `post_name` varchar(50) NOT NULL,
  `rating` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `student_id`, `post_name`, `rating`) VALUES
(1, 'CA20110', 'MySejahtera', 5.00),
(2, 'CA20113', 'BoostApps', 3.00),
(3, 'CN21658', 'Touch-N-Go', 4.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`Academic_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`username`);

--
-- Indexes for table `complaintlist`
--
ALTER TABLE `complaintlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`CV_id`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expert_prog`
--
ALTER TABLE `expert_prog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`Publication_id`),
  ADD KEY `Expertid` (`Expertid`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_ID`);

--
-- Indexes for table `reportexpert`
--
ALTER TABLE `reportexpert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportuser`
--
ALTER TABLE `reportuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`Research_id`),
  ADD KEY `Expert_id` (`Expertid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_prog`
--
ALTER TABLE `staff_prog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userb`
--
ALTER TABLE `userb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `Academic_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaintlist`
--
ALTER TABLE `complaintlist`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `CV_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expert_prog`
--
ALTER TABLE `expert_prog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `Publication_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reportexpert`
--
ALTER TABLE `reportexpert`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `reportuser`
--
ALTER TABLE `reportuser`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `Research_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff_prog`
--
ALTER TABLE `staff_prog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `userb`
--
ALTER TABLE `userb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`rating_ID`) REFERENCES `posts` (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
