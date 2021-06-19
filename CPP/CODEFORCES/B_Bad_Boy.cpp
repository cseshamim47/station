#include <bits/stdc++.h>
using namespace std;

int main()
{
    int t;
    cin >> t;

    while(t--)
    {
        int i,j,p,q;

        cin >> i >> j >> p >> q;
        if(i == 1 && j == 1 && p == 1 && q == 1){
            cout << "1 1 1 1" << endl;
        }else if((p == 1 && q != 1) || (p == 1 && q != j) || (p == i && q != 1) || (p == i && q != j) || (p != 1)){
            cout << 1 << " " << 1 << " " << i << " " << j << endl;
        }else{
            if(j == 1){
                if(p == 1){
                    cout << 2 << " " << 1 << " " << i << " " << 1 << endl;
                }else if(p == i){
                    cout << i-1 << " " << 1 << " " << 1 << " " << 1 << endl;
                }else{ 
                  cout << i << " " << 1 << " " << 1 << " " << 1 << endl;
                }
                continue;
            }
            if((p == 1 && q == 1)){
                cout << 1 << " " << p+1 << " " << i << " " << j << endl;
            }
            if(p==1 && q == j){
                cout << 1 << " " << j-1 << " " << i << " " << 1 << endl;
            }
            if(p == i && q == 1){
                cout << i << " " << q+1 << " " << 1 << " " << j << endl;
            }
            if(p == i && q == j){
                cout << i << " " << j-1 << " " << 1 << " " << 1 << endl;
            }
        }
        
    }
}


                            // 0 0 0 0 0
                            // 0 0 0 0 0
                            // 0 0 0 0 0
                            // 0 0 0 0 0
                            // 0 0 0 0 0