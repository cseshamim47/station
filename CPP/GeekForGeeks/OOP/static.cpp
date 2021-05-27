#include <bits/stdc++.h>
using namespace std;

class Player{
    static int count;
    public:
        Player(){count++;}
        ~Player(){count--;}
        static int getCount(){ return count; }
};
int Player::count = 0;
int main()
{
    Player p;
    printf("%d\n",Player::getCount());

    {
        Player l;
        Player a;
        Player y;
        Player e;
        Player r;
        printf("%d\n", Player::getCount());
    }

    printf("%d", Player::getCount());
    
    
}