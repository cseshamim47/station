#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n,x;
    cin >> n;
    vector<int>v;
    vector<int>::iterator it;
    while(n--){
        int op;
        cin >> op;
        if(op == 0){
            cin >> x;
            v.push_back(x);
        }else if(op == 2) v.pop_back();
         else{
             cin >> x;
             cout << v[x] << endl;
        }
    }
    
}