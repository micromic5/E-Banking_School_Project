<?php 
include("/layout/header.html");
include("/layout/nav.html");
include_once 'includes/functions.php';
include_once 'entity/accountPermissionEntity.php';
include_once 'entity/userEntity.php';

$saldoTotal = 0;
if(login_check($db) == true) {
	?>
	<div class="content">
		<h2>Overview</h2>
                <table>
                    <thead>
                        <th>Konto-Nummer</th>
                        <th>Konto-Bezeichnung</th>
                        <th>Konto-Inhaber</th>
                        <th>Saldo</th>
                    </thead>
                    <tbody>
                <?php
                    $user = new User($_SESSION['PK_customerNumber']);
                    $acpArr = $user->getAccountsPermission();
                    foreach($acpArr as $accountPermission){
                        $account = $accountPermission->getAccount();
                    ?>
                        <tr>
                        <td><?=$account->getPK_accountNumber()?></td>
                        <td><?=$account->getAccountType()?></td>
                        <td><?=$account->getAccountType()?></td>
                        <td><?=$user->getLastname()." ".$user->getFirstname()?></td>
                        <td><?=$account->getValue()?></td>
                        </tr>
                    <?php
                    }
                ?>
                    </tbody>
                </table>
	</div>

	<?php
} else { 
    ?>
	<p>You are not authorized to access this page, please login.</p>
	<?php
}
?>
<?php include("/layout/footer.html");?>