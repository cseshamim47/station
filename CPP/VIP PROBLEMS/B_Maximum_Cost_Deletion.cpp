//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){
    int n,a,b;
    cin >> n >> a >> b;
    string str;
    cin >> str;
    int ans = n*a;
    if(b > 0) ans += n*b;
    else{
        string tmp = str;
        int i = 0,zero=0,one=0;
        while(str.find('0') != string::npos){
            int j = i;
            if(str[i] == '0'){
                while(str[i] == '0' && i < n){
                    i++;
                    cnt++;
                }
                str.erase(j,cnt);
                zero++;
                i = 0;
                cnt = 0;
            }else i++;
        }
        i = 0;
        str = tmp;
        while(str.find('1') != string::npos){
            int j = i;
            if(str[i] == '1'){
                while(str[i] == '1' && i < n){
                    i++;
                    cnt++;
                }
                str.erase(j,cnt);
                one++;
                i = 0;
                cnt = 0;
            }else i++;
        }
        
        int x = 0;
        if(tmp.find('1') != string::npos && tmp.find('0') != string::npos){
            one++;
            zero++;
            x = min(one,zero);
        }else x = max(one,zero);
        ans += x*b;

        // string s = str;
        //  int cnt1=0;
        //     int z=0;
        //     for(int i=0;i<n;i++)
        //     {
        //         if(s[i]=='0')
        //         {
        //             while(s[i]=='0' && i<n)
        //             {
        //                 i++;
        //                 z++;
        //             }
        //             cnt1++;
        //         }
        //     }
        //     if(z!=n)cnt1++;
        //     int cnt2=0;
        //     z=0;
        //     for(int i=0;i<n;i++)
        //     {
        //         if(s[i]=='1')
        //         {
        //             while(s[i]=='1' && i<n)
        //             {
        //                 i++;
        //                 z++;
        //             }
        //             cnt2++;
        //         }
        //     }
        //     if(z!=n)cnt2++;
        //     int cnt=min(cnt1,cnt2);

        //     ans+=b*cnt;
        
    }
    cout << ans << "\n";
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    

}