#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n,t;
    cin >> n >> t;
    vector<int>v[n];
    while(t--){
        cin >> n;
        int idx,val;
        if(n == 0){
            cin >> idx >> val;
            v[idx].push_back(val);
        }else if(n == 1){
            cin >> idx;
            for(int i = 0; i < v[idx].size(); i++){
                if(i == v[idx].size()-1) cout << v[idx][i];
                else cout << v[idx][i] << " ";
            }
            cout << "\n";
        }else{
            cin >> idx;
            v[idx].clear();
        }
    }
    
}