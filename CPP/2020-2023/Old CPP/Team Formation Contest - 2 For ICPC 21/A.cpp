// In the name of ALLAH
// █▀▄▀█ █▀▄   █▀ █░█ ▄▀█ █▀▄▀█ █ █▀▄▀█   ▄▀█ █░█ █▀▄▀█ █▀▀ █▀▄
// █░▀░█ █▄▀   ▄█ █▀█ █▀█ █░▀░█ █ █░▀░█   █▀█ █▀█ █░▀░█ ██▄ █▄▀
// cseshamim47
// 15-08-2022 19:09:09


#include <bits/stdc++.h>
using namespace std;
#define fo(i,n) for(i=0;i<n;i++)
#define Fo(i,k,n) for(i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)

                    // Code Starts From Here       	

void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    cin >> n;
    m = n;
    char c[n][m];
    fo(i,n)
    {
        fo(j,m)
        {
            cin >> c[i][j];
        }
    }
    bool ok = true;
    fo(i,n)
    {
        int black = 0;
        fo(j,m)
        {   
            if(c[i][j] ==  'B') black++;
            if(j+3 > m) continue;
            Fo(k,j,min(m,j+3))
            {
                if(c[i][k] == 'B') cnt++;
            }
            if(cnt == 3 || cnt == 0)
            {
                // deb2(cnt,i);
                ok = false;
                break;
            }

            cnt = 0;
        }
        if(black != (n-black)) ok = false;
        if(!ok) break;
    }

    fo(j,n)
    {
        int black = 0;
        fo(i,m)
        {   
            if(c[i][j] ==  'B') black++;

            if(i+3 > m) continue;
            Fo(k,i,min(m,i+3))
            {
                if(c[k][j] == 'B') cnt++;
            }
            if(cnt == 3 || cnt == 0)
            {
                ok = false;
                break;
            }

            cnt = 0;
        }
        if(black != (n-black)) ok = false;
        if(!ok) break;
    }

    if(ok) cout << 1 << endl;
    else cout << 0 << endl;
}

int main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}