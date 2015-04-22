<?php 
require_once '/includes/includeHeader.php';
require_once 'entity/accountPermissionEntity.php';
require_once 'entity/customerEntity.php';
if(login_check($db) == true) 
{
    $saldo = 0;
    ?>
        <h2>Overview</h2>
        <div class="content">
            <table>
                    <thead>
                        <th>Konto-Nummer</th>
                        <th>Konto-Bezeichnung</th>
                        <th>Zugriffsart</th>
                        <th>Saldo</th>
                    </thead>
                    <tbody>
                <?php
                    $acpArr = $loggedUser->getAccountsPermissions();
                    foreach($acpArr as $accountPermission){                        
                        $account = $accountPermission->getAccount();
                        $saldo += $account->getValue();
                    ?>
                        <tr>
                        <td><?=$account->getPK_accountNumber()?></td>
                        <td><?=$account->getAccountType()->getName()?></td>
                        <td><?=$accountPermission->getPermission()->getName()?></td>
                        <td><?=$account->getValue()?></td>
                        </tr>
                    <?php
                    }
                ?>
                   </tbody>
            </table>
            <p>Saldo:<?= $saldo ?></p>
 	</div>
    <?php
} 
else 
{ 
    ?>
        <p>You are not authorized to access this page, please login.</p>
    <?php
}
?>
<?php
    require_once '/includes/includeFooter.php';
?>