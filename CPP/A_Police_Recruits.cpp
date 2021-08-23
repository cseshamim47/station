#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n,x,escape = 0,police = 0;
    cin >> n;
    
    for(int i = 0; i < n; i++){
        cin >> x;
        if(x == -1){
            if(police == 0) escape++;
            else police--;
        }else police += x;
    }
    cout << escape << "\n";
    
}