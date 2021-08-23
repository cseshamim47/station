#include <bits/stdc++.h>
using namespace std;

int main()
{
    int T,n;
    cin >> T;

    for(int i = 0; i < T; i++){
        cin >> n;
        for(int j = 30; j >= 0; j--){
            if((1<<j) & n){
                cout << (1ll<<j)-1 << endl;
                break;
            }
        }
    }
}