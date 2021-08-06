#include <bits/stdc++.h>
using namespace std;

int main()
{
    int digits,divisor;
    cin >> digits >> divisor;

    if(divisor == 10){
        if(digits==1) cout << "-1";
        else{
            cout << '1';
            for(int i = 0; i < digits-1; i++){
                cout << '0';
            }
            puts("");
        }
    }else{
            cout << divisor;
            digits--;
            while(digits--){
                cout << '0';
            }
            puts("");
    }
    
}