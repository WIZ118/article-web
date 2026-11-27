<?php

namespace App\Laravel\Controllers\Web;

use App\Laravel\Models\Article;
use App\Laravel\Models\CMS;
use App\Laravel\Requests\PageRequest;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function __construct()
    {
        $this->data['articles'] = [
            [
                'id' => 1,
                'title' => 'Les Misérables',
                'summary' => 'It is structured into five main volumes that follow Jean Valjean\'s journey from hardened criminal to redeemed soul, while exploring the social, political, and moral landscape of 19th-century France.',
                'content' => '• Released after 19 years of hard labor for stealing bread, Jean Valjean is rejected by society until Bishop Myriel forgives him for stealing silver and gifts him two candlesticks. Inspired, Valjean breaks parole, adopts the alias Monsieur Madeleine, and becomes a wealthy, beloved factory owner and mayor in Montreuil-sur-Mer.',
                'image' => 'assets/images/article1.jpg',
                'author' => 'John Doe',
                'published_at' => '2026-06-10',
            ],
            [
                'id' => 2,
                'title' => 'Dear Evan Hansen',
                'summary' => 'It follows a socially anxious high school senior whose fabricated friendship with a deceased classmate spirals into a viral movement, forcing him to confront grief, loneliness, and the consequences of his dishonesty.',
                'content' => 'Evan Hansen struggles with severe social anxiety. Following his therapist’s advice to write encouraging letters to himself ("Dear Evan Hansen..."), he prints a letter at school expressing his isolation and his crush on classmate Zoe Murphy. When Connor Murphy, a troubled classmate, finds the letter and commits suicide, Evan is mistakenly believed to have been Connor\'s friend. The Murphy family, grieving their son\'s death, embraces Evan as a source of comfort. As Evan becomes entangled in the family\'s mourning and gains social recognition, he faces moral dilemmas and the consequences of his deception.',
                'image' => 'assets/images/article2.jpg',
                'author' => 'John Doe',
                'published_at' => '2026-06-11',
            ],
            [
                'id' => 3,
                'title' => 'Hamilton',
                'summary' => 'It is a 2015 sung-and-rapped-through biographical musical that follows the rise and fall of American Founding Father Alexander Hamilton, told through hip-hop, R&B, and traditional show tunes with a diverse cast.',
                'content' => 'Born out of wedlock in the Caribbean, Alexander Hamilton survives poverty and a devastating hurricane before locals raise money to send him to New York for an education in 1776. There, he becomes a revolutionary, a founding father, and the first Secretary of the Treasury. The musical explores Hamilton\'s personal and political struggles, his relationships with key figures like George Washington and Thomas Jefferson, and his eventual death in a duel with Aaron Burr.',
                'author' => 'John Doe',
                'published_at' => '2026-06-12',
            ],
            [
                'id' => 4,
                'title' => 'Annie',
                'summary' => 'It is a 1977 Broadway musical (with music by Charles Strouse, lyrics by Martin Charnin, and book by Thomas Meehan) based on the Little Orphan Annie comic strip, following an optimistic orphan in 1930s New York City who charms a billionaire and foils a kidnapping scheme.',
                'content' => 'In 1933, during the Great Depression, 11-year-old Annie lives under the cruel, alcoholic caretaker Miss Hannigan. Believing her parents will return for her—guided by half a silver locket and a note they left behind—Annie briefly escapes into the city\'s Hooverville shantytowns before being caught and returned.',
                'image' => 'assets/images/article4.jpg',
                'author' => 'John Doe',
                'published_at' => '2026-06-13',
            ],
            [
                'id' => 5,
                'title' => 'The Lion King',
                'summary' => 'It is Disney\'s 1994 animated film and 1997 Broadway stage musical, following a young lion prince named Simba who flees his kingdom after his treacherous uncle murders his father, only to return years later to reclaim his rightful throne.',
                'content' => 'In the African Pride Lands, King Mufasa and Queen Sarabi celebrate the birth of their son, Simba ("Circle of Life"). This angers Mufasa\'s jealous younger brother, Scar, who falls behind Simba in the line of succession. Scar plots to kill Mufasa and Simba, and he manipulates Simba into a gorge where he is attacked by a wildebeest stampede. Mufasa saves Simba but is killed by Scar. Scar convinces Simba that he is responsible for his father\'s death and urges him to flee. Simba grows up in exile with Timon and Pumbaa, but eventually returns to challenge Scar and reclaim his place as king.',
                'image' => 'assets/images/article5.jpg',
                'author' => 'John Doe',
                'published_at' => '2026-06-14',
            ],
            [
                'id' => 6,
                'title' => 'Wicked',
                'summary' => 'Wicked (the 2003 Broadway musical by Stephen Schwartz and Winnie Holzman, loosely based on Gregory Maguire\'s 1995 novel) is a revisionist prequel to The Wizard of Oz that explores the unlikely friendship between Elphaba, the misunderstood green-skinned girl who becomes the Wicked Witch of the West, and Glinda, the bubbly blonde who becomes Glinda the Good.',
                'content' => 'Born with bright green skin and raw magical power, Elphaba arrives at Shiz University to look after her younger sister, Nessarose, who uses a wheelchair. Through a mix-up, Elphaba is forced to room with Galinda (later Glinda), a popular, self-absorbed socialite. Despite initial mutual hatred ("What Is This Feeling?"), they bond after Elphaba helps Galinda join a prestigious sorcery seminar.',
                'image' => 'assets/images/article6.jpg',
                'author' => 'John Doe',
                'published_at' => '2026-06-15',
            ],
        ];
    }

    public function index(PageRequest $request)
    {
        $this->data['page_title'] = 'Home Page';
        $this->data['home'] = CMS::home(Auth::guard('user')->id());
        $this->data['articles'] = $this->visibleArticles();

        return view('web.home', $this->data);
    }

    public function about(PageRequest $request)
    {
        $this->data['page_title'] = 'About Page';
        $this->data['about'] = CMS::about(Auth::guard('user')->id());

        return view('web.about', $this->data);
    }

    public function contact(PageRequest $request)
    {
        $this->data['page_title'] = 'Contact Page';
        $this->data['contact'] = CMS::contact(Auth::guard('user')->id());

        return view('web.contact', $this->data);
    }

    public function article(PageRequest $request, $id = null)
    {
        $this->data['page_title'] = 'Article Page';

        if (preg_match('/^user-(\d+)$/D', (string) $id, $matches) === 1) {
            $user = Auth::guard('user')->user();
            $article = $user
                ? Article::where('user_id', $user->id)->whereKey((int) $matches[1])->first()
                : null;

            if (! $article) {
                abort(404);
            }

            $this->data['article'] = $this->formatUserArticle($article, $user->name);
        } elseif (ctype_digit((string) $id)) {
            $this->data['article'] = collect($this->data['articles'])->firstWhere('id', (int) $id);

            if (! $this->data['article']) {
                abort(404);
            }
        } else {
            abort(404);
        }

        return view('web.article', $this->data);
    }

    public function articles(PageRequest $request)
    {
        $this->data['page_title'] = 'Articles Page';
        $search = strtolower(trim((string) $request->query('search')));
        $articles = collect($this->visibleArticles());

        if ($search !== '') {
            $articles = $articles->filter(function (array $article) use ($search) {
                return str_contains(strtolower($article['title']), $search)
                    || str_contains(strtolower($article['summary']), $search);
            });
        }

        $this->data['articles'] = $articles->values()->all();
        $this->data['search'] = $search;

        return view('web.articles', $this->data);
    }

    private function visibleArticles(): array
    {
        $user = Auth::guard('user')->user();

        if (! $user) {
            return $this->data['articles'];
        }

        $userArticles = Article::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get()
            ->map(fn(Article $article) => $this->formatUserArticle($article, $user->name))
            ->all();

        return array_merge($this->data['articles'], $userArticles);
    }

    private function formatUserArticle(Article $article, string $author): array
    {
        $description = (string) ($article->description ?? '');
        $image = 'assets/images/home1.svg';

        if ($article->filename && $article->getRawOriginal('directory')) {
            $image = rtrim((string) $article->directory, '/') . '/resized/' . $article->filename;
        }

        return [
            'id' => $article->id,
            'route_id' => 'user-' . $article->id,
            'title' => $article->name ?: 'Untitled article',
            'summary' => trim(strip_tags($description)),
            'content' => $description,
            'image' => $image,
            'author' => $author,
            'published_at' => $article->created_at?->format('Y-m-d') ?? '',
            'is_user_article' => true,
        ];
    }
}
