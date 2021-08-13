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
    vector<vector<int>> v,ans;
    for(int i = 0; i < n; i++){
        vector<int> tmp;
        for(int j = 0; j < m; j++){
            int d;   cin >> d;   tmp.push_back(d);
        }
        sort(tmp.begin(),tmp.end());
        v.push_back(tmp);
    }

    for(int i = 0; i < m; i++){
        int idx = -1;
        int mn = INT_MAX;
        for(int j = 0; j < n; j++){
            if(v[j][0] < mn){
                mn = v[j][0];
                idx = j;
            }
        }
        int vmaxIdx = v[0].size()-1; 
        for(int k = 0; k < n; k++){
            if(ans.size() != n) ans.push_back(vector<int>());
            if(idx == k){
                ans[idx].push_back(mn);
                v[idx].erase(v[idx].begin());
            }else{
                ans[k].push_back(v[k][vmaxIdx]);
                v[k].pop_back();
            }
        }
    }


    for(auto &i : ans){
        for(auto &j : i) cout << j << " ";
    cout << endl;
    }
    
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);


}