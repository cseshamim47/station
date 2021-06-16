#include <bits/stdc++.h>
using namespace std;

int main()
{
    int t,n,val;
    string key;
    cin >> t;
    map<string,int> m;
    while(t--){
        cin >> n;
        if(n == 0){
            cin >> key >> val; 
            auto pos = m.find(key);
            if(pos != m.end()) pos->second = val;
            else m.insert(make_pair(key,val));
        }else if(n == 1){
            cin >> key;
            auto pos = m.find(key);
            if(pos != m.end()) cout << m[key] << "\n";
            else cout << 0 << endl;
        }else{
            cin >> key;
            m.erase(key);
        }
    }
    
}