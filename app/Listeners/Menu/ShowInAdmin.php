<?php

namespace App\Listeners\Menu;

use App\Traits\Permissions;
use App\Events\Menu\AdminCreated as Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class ShowInAdmin
{
    use Permissions;

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle(Event $event)
    {
        $menu = $event->menu;

        $this->addDashboardsMenu($menu);
        $this->addItemsMenu($menu);
        $this->addSalesMenu($menu);
        $this->addPurchasesMenu($menu);
        $this->addBankingMenu($menu);
        $this->addReportsMenu($menu);
    }

    private function addDashboardsMenu($menu)
    {
        $title = trim(trans_choice('general.dashboards', 1));
        if ($this->canAccessMenuItem($title, 'read-common-dashboards')) {
            $inactive = ('dashboard' != Route::currentRouteName()) ? true : false;
            $menu->route('dashboard', $title, [], 10, ['icon' => 'dashboard', 'inactive' => $inactive]);
        }
    }

    private function addItemsMenu($menu)
    {
        $title = trim(trans_choice('Sales', 2));
        if ($this->canAccessMenuItem($title, 'read-common-items')) {
            $menu->route('items.index', $title, [], 20, ['icon' => 'inventory_2']);
        }
    }

    private function addSalesMenu($menu)
    {
        $title = trim(trans_choice('general.sales', 3));
        if ($this->canAccessMenuItem($title, ['read-sales-invoices', 'read-sales-customers'])) {
            $this->addSalesInvoicesMenuItem($menu);
            $this->addSalesCustomersMenuItem($menu);
        }
    }

    private function addSalesInvoicesMenuItem($menu)
    {
        $title = trim(trans_choice('Invoicing', 2));
        if ($this->canAccessMenuItem($title, 'read-sales-invoices')) {
            $menu->route('invoices.index', $title, [], 30, ['icon' => 'money', 'inactive' => '']);
        }
    }

    private function addSalesCustomersMenuItem($menu)
    {
        $title = trim(trans_choice('Account Receivables', 2));
        if ($this->canAccessMenuItem($title, 'read-sales-customers')) {
            $menu->route('customers.index', $title, [   ], 40, ['icon' => 'man', 'inactive' => '']);
        }
    }

    private function addPurchasesMenu($menu)
    {
        $title = trim(trans_choice('general.purchases', 2));
        if ($this->canAccessMenuItem($title, ['read-purchases-bills', 'read-purchases-vendors'])) {
            $this->addPurchasesBillsMenuItem($menu);
            $this->addPurchasesVendorsMenuItem($menu);
        }
    }

    private function addPurchasesBillsMenuItem($menu)
    {
        $title = trim(trans_choice('general.expenses', 2));
        if ($this->canAccessMenuItem($title, 'read-purchases-bills')) {
            $menu->route('bills.index', $title, [], 50, ['icon' => 'shopping_cart', 'inactive' => '']);
        }
    }

    private function addPurchasesVendorsMenuItem($menu)
    {
        $title = trim(trans_choice('general.purchases', 2));
        if ($this->canAccessMenuItem($title, 'read-purchases-vendors')) {
            $menu->route('vendors.index', $title, [], 60, ['icon' => 'inventory', 'inactive' => '']);
        }
    }

    private function addBankingMenu($menu)
    {
        $title = trim(trans('general.banking'));
        if ($this->canAccessMenuItem($title, ['read-banking-accounts', 'read-banking-transfers', 'read-banking-transactions', 'read-banking-reconciliations'])) {
            $this->addBankingAccountsMenuItem($menu);
            $this->addBankingTransactionsMenuItem($menu);
            $this->addBankingTransfersMenuItem($menu);
            $this->addBankingReconciliationsMenuItem($menu);
        }
    }

    private function addBankingAccountsMenuItem($menu)
    {
        $title = trim(trans_choice('general.accounts', 2));
        if ($this->canAccessMenuItem($title, 'read-banking-accounts')) {
            $menu->route('accounts.index', $title, [], 70, ['icon' => 'account_balance', 'inactive' => '']);
        }
    }

    private function addBankingTransactionsMenuItem($menu)
    {
        $title = trim(trans_choice('Accounting Entries', 2));
        if ($this->canAccessMenuItem($title, 'read-banking-transactions')) {
            $menu->route('transactions.index', $title, [], 80, ['icon' => 'speed', 'inactive' => '']);
        }
    }

    private function addBankingTransfersMenuItem($menu)
    {
        $title = trim(trans_choice('Inventory', 2));
        if ($this->canAccessMenuItem($title, 'read-banking-transfers')) {
            $menu->route('transfers.index', $title, [], 90, ['icon' => 'rocket_launch', 'inactive' => '']);
        }
    }

    private function addBankingReconciliationsMenuItem($menu)
    {
        $title = trim(trans_choice('Payroll', 2));
        if ($this->canAccessMenuItem($title, 'read-banking-reconciliations')) {
            $menu->route('reconciliations.index', $title, [], 100, ['icon' => 'donut_small', 'inactive' => '']);
        }
    }

    private function addReportsMenu($menu)
    {
        $title = trim(trans_choice('Tax Reports', 2));
        if ($this->canAccessMenuItem($title, 'read-common-reports')) {
            $menu->route('reports.index', $title, [], 110, ['icon' => 'reports', 'inactive' => '']);
        }
    }


   

    private function addSettingsMenu($menu)
{
    $title = trim(trans_choice('general.settings'));
    if ($this->canAccessMenuItem($title, 'read-settings')) {
        $menu->route('settings.index', $title, [], 120, ['icon' => 'settings', 'inactive' => '']);
    }
}


}




