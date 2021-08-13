#include <bits/stdc++.h>
using namespace std;

int main()
{
    string s;
    cin >> s;
    int x = stoi(s);
    vector<int> v;
    
    while(x != 0){
        int mod = x%2; // 1 0 1
        v.push_back(mod); //1 0 1
        x /= 2; // 2 1 0
    }    
    
    for(int i = v.size()-1; i >= 0; i--){
        cout << v[i];
    }
    
}