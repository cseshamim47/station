#include <bits/stdc++.h>
using namespace std;

int main()
{
    ios_base::sync_with_stdio();
    cin.tie(NULL);
    int q;
    cin >> q;
    while(q--)
    {
        int n;
        cin >> n;
        string str;
        cin >> str;

        int l = 0, r = n-1;

        while(l < r && str[l] == str[r])
        {
            l++;
            r--;
        }



        char a = str[l];
        char b = str[r];
        int cnta = 0;

        bool notPossiblea = false;
        while(l < r)
        {
            if(str[l] == str[r])
            {
                l++;
                r--;
            }else
            {
                if(str[l] == a) l++;
                else if(str[r] == a) r--;
                else{
                    notPossiblea = true;
                    r--;
                }

                cnta++;
            }
        }

        int cntb = 0;
        l = 0, r = n-1;
        bool notPossibleb= false;
        while(l < r)
        {
            if(str[l] == str[r])
            {
                l++;
                r--;
            }else
            {
                if(str[l] == b) l++;
                else if(str[r] == b) r--;
                else {
                    notPossibleb = true;
                    r--;
                }

                cntb++;
            }
        }

        if(notPossiblea && notPossibleb)
        {
            cout << -1 << endl;
        }else if(!notPossiblea && !notPossibleb)
        {
            cout << min(cnta,cntb) << endl;
        }else if(!notPossiblea) cout << cnta << endl;
        else cout << cntb << endl;




    }
}
