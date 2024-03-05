//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define w(t) while(t--){ solve(); }
int cnt;

void solve(){
    int n,l;
    cin >> n >> l;
    n = n*2 - 1;
    string str[n];
    for(int i = 0; i < n; i++){
        cin >> str[i];
    }
    string ans = "";
    for(int i = 0; i < l; i++){
        map<char,int> mp;
        for(int j = 0; j < n; j++){
            if(mp[str[j][i]] == 0) mp[str[j][i]] = 1;
            else mp[str[j][i]] = 0;
        }
        map<char,int>::iterator it;
        it = mp.begin();
        while(it != mp.end()){
            if(it->second == 1) ans += it->first;
            it++;
        }
    }
    cout << ans << endl;
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    // cls

}