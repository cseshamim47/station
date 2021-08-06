#include <bits/stdc++.h>
using namespace std;

int main()
{
    set<int> S;
    int x,n;
    cin >> n;
    while(n--){
        cin >> x;
        if(x == 0){
            cin >> x;
            S.insert(x);
            cout << S.size() << "\n";
        }else if(x==1 || x == 2){
            int d;
            cin >> d;
            auto pos = S.find(d);
            if(x == 1){
                if(pos != S.end()) cout << 1 << "\n";
                else cout << 0 << "\n";
            }else{
                S.erase(d);
            }
        }
    }


    
}