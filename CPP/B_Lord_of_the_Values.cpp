//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    int n;
    cin >> n;
    int arr[n+5];
    for(int i = 0; i < n; i++) cin >> arr[i];

    vector<pair<int,pair<int,int>>> v;
    for(int i = 0; i < n; i+=2){
        int a = i;
        int b = i+1;
        if(arr[a] != arr[b]){
            a++; b++;
            v.push_back({1,{a,b}});
            v.push_back({2,{a,b}});
            v.push_back({1,{a,b}});
            v.push_back({1,{a,b}});
            v.push_back({2,{a,b}});
            v.push_back({1,{a,b}});
        }else{
            a++; b++;
            v.push_back({2,{a,b}});
            v.push_back({2,{a,b}});
            v.push_back({1,{a,b}});
            v.push_back({1,{a,b}});
        }
    }
    cout << v.size() << "\n";
    for(int i = 0; i < v.size(); i++){
        cout << v[i].first << " " << v[i].second.first << " " << v[i].second.second << "\n";
    }
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}