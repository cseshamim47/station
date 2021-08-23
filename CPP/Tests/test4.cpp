#include <iostream>
#include <fstream>
using namespace std;

int atmBalance = 1000000;

#define cls system("cls");

void options()
{
    cout << "Choose an option" << "\n";
    cout << "1. Cash deposit" << "\n";
    cout << "2. Cash Withdraw" << "\n";
    cout << "3. Cash Exchange" << "\n";
    cout << "4. Check Balance" << "\n";
    cout << "5. Log out of the session" << "\n";
    cout << "\n" << "Choose Option : " ;
}
void ATM()
{
    double balance = 0;
    cout << "Press Enter To Insert Your Card\n";
    getchar();
    int passcode;
    cout << "Enter Passcode : ";
    getchar();

    while(true)
    {
        cls
        options();
        int option;
        cin >> option;
        if(option == 1)
        {
            cout << "#DEPOSIT FORMAT#" << "\n";
            cout << "1. DEPOSIT BDT" << "\n";
            cout << "2. DEPOSIT USD" << "\n";
            cin >> option;
            double amount;
            if(option == 1)
            {
                cout << "Enter Amount in BDT : ";
                cin >> amount;
                balance += amount;
                cout << "Cash Deposited Successfully!" << "\n";
            }
            else if(option == 2)
            {
                cout << "Enter Amount in USD : ";
                cin >> amount;
                cout << "BDT Amount : " << amount*83.50 << "\n";
                balance += amount*83.50;
                cout << "Cash Deposited Successfully!" << "\n";
            }
            else cout << "Wrong input!!!" << "\n";
            getchar();getchar();
        }
        else if(option == 2)
        {
            double amount;
            cout << "# BDT WITHDRAWAL #" << "\n";
            cout << "Your Current Balance : " << balance << endl;
            cout << "\nEnter Amount in BDT : ";
            cin >> amount;
            if(amount <= balance)
            {
            cout << "Press Enter to Withdraw!!" << "\n";
            getchar();
            getchar();
            balance -= amount;
            cout << "Cash withdrawn Successfully!" << "\n";
            }
            else
            {
                cout << "Insufficient Funds!!!" << "\n";
                getchar();
            }
            getchar();
        }
        else if(option == 3)
        {
            cout << "EXCHANGE BDT TO USD" << "\n";
            cout << "ATM Current Balance : " << atmBalance << endl;

            double amount;
            cout << "Enter Amount in USD : ";
            cin >> amount;
            cout << "BDT Amount : " << amount*83.50 << "\n";
            if(amount*83.50 <= atmBalance)
            {
				cout << "Press Enter to Withdraw!!" << "\n";
				getchar();
				getchar();
				atmBalance -= amount*83.50;
				cout << "Cash exchanged Successfully!" << "\n";
            }
            else
            {
                cout << "Insufficient ATM Funds!!!" << "\n";
                getchar();
            }
            getchar();
        }
        else if(option == 4)
        {
            ofstream myfile;
            myfile.open("balance.txt");
            myfile << balance << "\n";
            myfile.close();

            string line;
            ifstream myfileO("balance.txt");
            if(myfileO.is_open())
            {
                cout << "Your Balance is BDT ";
                if(getline(myfileO,line))
                    cout << line;
                cout << "." << "\n"; // full stop
                myfileO.close();
            }
            else
                cout << "Something went wrong!" << "\n";
            getchar();getchar();
        }
        else if(option == 5)
		{
			ofstream myfile;
            myfile.open("balance.txt");
            myfile << balance << "\n";
            myfile.close();
			break;
		}
    }
}

int main()
{
    ATM();

}