//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    int n,m;
    cin >> n >> m;
    string str;
    cin >> str;
    vector<int>v;

    for(int i = 0; i < min(n,m); i++){
        for(int j = 0; j < n; j++){
            if(j == 0 && str[j] == '0' && str[j+1] == '1') v.push_back(j);
            else if(j == n-1 && str[j] == '0' && str[j-1] == '1') v.push_back(j);
            else{
                if(str[j] == '0' && (str[j-1] - '0' + str[j+1] - '0') == 1) v.push_back(j);
            }
        }
        for(auto &it : v) str[it] = '1';
    }

    cout << str << "\n";
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}

// n(n+n) -> n^2 + n^2 -> 2n^2 ->->->->->-> o(n^2)