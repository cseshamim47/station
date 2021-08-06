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
    string str;
    cin >> str;
    int track[26] = {0};
    for(int i = 0; i < n; i++){
       track[str[i]-'A']++;
    }
    for(int i = 1; i < n; i++){
        if(str[i] != str[i-1] && track[str[i]-'A'] > 0) track[str[i-1]-'A'] = 0;
        track[str[i]-'A']--;
        if(track[str[i]-'A'] < 0){
            cout << "NO" << endl;
            return;
        }
    }
    cout << "YES" << endl;
}

int main()
{
      //        Bismillah
    int t;   cin >> t;   w(t);
    

}