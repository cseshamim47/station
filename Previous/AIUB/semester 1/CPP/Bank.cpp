#include <iostream>
using namespace std;
int toa = 0;
int person=1;
int attemp = 0;
class user{
    private:
        string name;
        long long nid;
        string dob;
        long double balance;
    public:
        void setUser(string n){
            name = n;
        }
        string getUser(){
            return name;
        }

        void setNid(long long ni){
            nid = ni;
        }
        long long getNid(){
            return nid;
        }

        void setDob(string d){
            dob = d;
        }
        string getDob(){
            return dob;
        }
        void setBal(long double b){
            balance = b;
        }
        long double getBal(){
            return balance;
        }
};

user info[100];

class database:public user{
    public:
        void createUser(){
            cout << "Person : " << person << endl;
            person++;
            cout << "Enter Name : ";
            string cname;
            cin >> ws;
            getline(cin,cname);

            cout << "Enter NID : ";
            long long cnid;
            cin >> cnid;

            cout << "Enter Date of Birth : ";
            string cdob;
            cin >> ws;
            getline(cin,cdob);


            info[toa].setUser(cname);
            info[toa].setNid(cnid);
            info[toa].setDob(cdob);

            toa++;
        }

        void showUserInfoAll(){
            for(int i=0; i<toa; i++){
                cout << "\nName : " << info[i].getUser() << endl;
                cout << "NID : " << info[i].getNid() << endl;
                cout << "Date of Birth : " << info[i].getDob() << endl;
                cout << "Balance : " << info[i].getBal() << endl;
            }
        }

        void showUserInfo(){
            cout << "Enter your NID : ";
            long long check;
            cin >> check;
            for(int i=0; i<toa; i++){
               if(info[i].getNid()== check){
                cout << "\nName : " << info[i].getUser() << endl;
                cout << "NID : " << info[i].getNid() << endl;
                cout << "Date of Birth : " << info[i].getDob() << endl;
                cout << "Balance : " << info[i].getBal() << endl;
               }
            }
        }

        void deleteUser(){
            int pos = -1;
            cout << endl << "Enter NID : ";
            long long del;
            cin >> del;
            for(int i=0; i<toa; i++){
                if(info[i].getNid()==del){
                    pos = i;
                    break;
                }
            }
            if(pos > -1){
                for(int i=pos;i<toa;i++){
                    info[i]=info[i+1];
                }
                toa--;
            }else{
                cout<<"NID not found"<<endl;
            }
        }

        void deposit(){
            int bpos;
            long double cbal;
            cout << "\nFor desposit, Enter your NID : ";
            long long check;
            cin >> check;
            for(int i=0; i<toa; i++){
               if(info[i].getNid()== check){
                    cout << "\nName : " << info[i].getUser() << endl;
                    cout << "NID : " << info[i].getNid() << endl;
                    cout << "Enter the amount you want to deposit : ";
                    cin >> cbal;
                    if(cbal>=1){
                        info[i].setBal(cbal);
//                        bpos = i;
                    }
                    break;
               }
            }
        }

        void withdraw(){
            long double wbal;
            long double curbal;
            cout << "\nFor withdraw, Enter your NID : ";
            long long check;
            cin >> check;

            for(int i=0; i<toa; i++){
               if(info[i].getNid() == check){
                    cout << "\nName : " << info[i].getUser() << endl;
                    cout << "NID : " << info[i].getNid() << endl;
                    cout << "Balance : " << info[i].getBal() << endl;
                    cout << "Enter the amount you want to withdraw : ";
                    cin >> wbal;
                    if(wbal>=1){
                        curbal = info[i].getBal();
                        curbal = curbal - wbal;
                        if(curbal>=0){
                            info[i].setBal(curbal);
                        }
                    }
                    break;
               }
            }
        }
        void checkBalance(){
            cout << "Enter your NID : ";
            long long check;
            cin >> check;
            for(int i=0; i<toa; i++){
               if(info[i].getNid()== check){
                cout << "\nName : " << info[i].getUser() << endl;
                cout << "Balance : " << info[i].getBal() << endl;
               }
            }
        }
};
void breaker(){
    return;
}
void optionMessage(){
    cout << "\nPress 0 : Exit Program" << endl;
    cout << "Press 1 : All user info" << endl;
    cout << "Press 2 : Signle user info" << endl;
    cout << "Press 3 : Delete a user" << endl;
    cout << "Press 4 : Deposit money" << endl;
    cout << "Press 5 : Withdraw money" << endl;
    cout << "Press 6 : Check balance" << endl;
    cout << "Press 7 : Create new user(must not match prev. id)" << endl;
    cout << "\nChoose an option: " << endl;
}
void optionMessageSingle(){
    for(;;){
        cout << "Write 'option' to see all option again( Enter 'skip' to skip ) : ";
    string a;
    cin>>a;
    if(a=="option" || a=="Option" || a=="OPTION"){
        optionMessage();
        break;
    }else if(a=="skip" || a=="SKIP" || a=="Skip"){
        cout << "Now enter 0 two times to exit!!" << endl;
        break;
    }else{
        cout << "Wrong keyword" << endl;
        continue;
        }
    }

};
void newbankacc();
void bankacc();
void booth(){
//    optionMessage();
    int op;
    database ob;
    for(;;){
        cin >> op;
        if(op==1){
            ob.showUserInfoAll();
            optionMessageSingle();
        }
        if(op==2){
            ob.showUserInfo();
            optionMessageSingle();
        }
        if(op==3){
            ob.deleteUser();
            optionMessageSingle();
        }
        if(op==4){
             ob.deposit();
             optionMessageSingle();
        }
        if(op==5){
             ob.withdraw();
             optionMessageSingle();
        }
        if(op==6){
             ob.checkBalance();
             optionMessageSingle();
        }
        if(op==7){
           newbankacc();
//           optionMessageSingle();
        }
        if(op == 0){
            break;
        }
        if((op<1 || op>7) && op){
            continue;
        }

    }
}
void newbankacc(){
    database ob;

    cout << "How many users do you want to create?" << endl;
    int busers;
    cin >> busers;

    if(busers>0){
        for(int i=0; i<busers; i++){
            ob.createUser();
        }
    }
    optionMessage();
}
void bankacc(){
    if(attemp==0){
    cout << "\aCreate some users before you move on. " << endl;
    }
    attemp++;
    database ob;

    cout << "How many users do you want to create?" << endl;
    int busers;
    cin >> busers;

    if(busers>0){
        for(int i=0; i<busers; i++){
            ob.createUser();
        }
    }
    optionMessage();
    booth();

}



int main()
{
    bankacc();

//    database ob;
//    ob.createUser();
//    ob.createUser();
//    ob.createUser();
//    ob.deposit();
//    ob.checkBalance();
//    ob.withdraw();
//    ob.showUserInfoAll();

}
