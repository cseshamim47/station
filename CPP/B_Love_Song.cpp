//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;

void solve(){
    int n,q;
    cin >> n >> q;
    string str;
    cin >> str;

    vector<int> v[28];
    int x = 1;
    for(char ch = 'a'; ch <= 'z'; ch++)
    {
        if(str[0] == ch)
        {
            v[x].push_back(1);
        }
        else
        {
            v[x].push_back(0);
        }
        for(int i = 1; i < n; i++){
            if(str[i] == ch)
            {
                v[x].push_back(v[x][i-1]+1);
            }
            else
            {
                v[x].push_back(v[x][i-1]);
            }
        }
        x++;
    }
    while(q--){
        int l,r;
        cin >> l >> r;
        l--; r--;
        long long ans = 0;
        for(int i = 1; i<=26; ++i){
            int tmp = 0;
            if(l==0){
                tmp = v[i][r];
            }
            else
            {
                tmp = v[i][r] - v[i][l-1];
            }
            ans += tmp*i;
        }
        cout << ans << "\n";
    }
    
    
}

int main()
{
    solve();
}
