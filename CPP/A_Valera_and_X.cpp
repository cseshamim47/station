#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    char diag,ch,ndiag;
    int l = 0, r = 1;
    int flag = 0;

    for(int i = 0; i < n*n; i++){
        cin >> ch;
        if(i == 0){
            diag = ch;
        }
        if(i == 1){
            ndiag = ch;
        }

        if((n-1)*r != i && (n+1)*l != i && (ndiag != ch || diag == ch)){
            // cout << "third : "<< i << endl;
            flag++;
        } 

        if(((n+1)*l == i)){
            if(diag != ch){
                // cout <<"first : " << i << endl;
                flag++;
            }  
            l++;
        }
        if((n-1)*r == i){
            if(diag != ch){
                // cout << "second : " << i << endl;
                flag++; 
            } 
            r++;
        }
    }
    // cout << flag << endl;
    if(flag) cout << "NO\n";
    else cout << "YES\n";
    
}