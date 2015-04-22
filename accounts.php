<?php 
require_once '/includes/includeHeader.php';
if(login_check($db) == true) 
{
    $saldo = 0;
    ?>
        <h2>Konti</h2>
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
                    <tr>
                        <td><span>Gesamt Saldo:</span></td>
                        <td></td>
                        <td></td>
                        <td><span><?= number_format((float)$saldo, 2, '.', '') ?></span></td>
                    </tr>
                   </tbody>
            </table>            
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